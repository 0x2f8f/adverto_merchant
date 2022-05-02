<?php

namespace App\CompanyConnection\Controller;

use App\Companies\DataProvider\LegalDataProvider;
use App\Companies\Entity\Company;
use App\Companies\Entity\LegalOrganisationType;
use App\Companies\Service\CompanyService;
use App\CompanyConnection\Service\CompanyConnectionService;
use App\Core\Controller\BaseApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[Route('/connect/legal-info')]
class LegalInfoController extends BaseApiController
{
    public function __construct(
        private TokenStorageInterface    $tokenStorage,
        private CompanyService           $companyService,
        private CompanyConnectionService $companyConnectionService
    ) {
    }

    #[Route('/{companyId}', methods: ['GET'])]
    public function indexAction(int $companyId): JsonResponse
    {
        $company = $this->getCompany($companyId);
        if ($errorResponse = $this->checkPermission($company)) {
            return $errorResponse;
        }

        return self::getJsonResponse(
            [
                'company_legal_info'       => $this->companyConnectionService->getCompanyLegalInfo($company)->toArray(),
                'legal_organisation_types' => $this->companyConnectionService->getLegalOrganisationTypes(),
            ]
        );
    }

    #[Route('/{companyId}', methods: ['PUT'])]
    public function updateAction(
        int               $companyId,
        Request           $request,
        CompanyService    $companyService,
        LegalDataProvider $legalDataProvider
    ): JsonResponse {
        $company = $this->getCompany($companyId);

        if ($errorResponse = $this->checkPermission($company)) {
            return $errorResponse;
        }

        $parameters = json_decode($request->getContent(), true);
        if ($errorResponse = $this->checkFieldsUpdate($parameters)) {
            return $errorResponse;
        }

        //проверяем наличие переданного типа вида организации
        $legalOrganizationType = $parameters['legal_organization_type'];
        $legalTypeObj          = $legalDataProvider->getLegalOrganizationTypeById($legalOrganizationType);
        if ($errorResponse = $this->checkLegalType($legalOrganizationType, $legalTypeObj)) {
            return $errorResponse;
        }

        //проверяем, что в данной стране есть такой вид деятльности
        if ($errorResponse = $this->checkLegalTypeInCountry($company, $legalTypeObj)) {
            return $errorResponse;
        }

        //проверяем что запрашиваемые юр.поля подходят указанной у компании стране
        if ($errorResponse = $this->checkLegalProperties(
            $legalDataProvider,
            $company->getCountryId(),
            $parameters['legal_properties']
        )) {
            return $errorResponse;
        }

        try {
            $company = $this->companyConnectionService->updateCompanyLegalInfo(
                $company,
                $legalTypeObj,
                $parameters['need_license'],
                $parameters['legal_properties']
            );
            //$company = $companyService->updateLegalOrganizationTypeCompany($company, $legalTypeObj, );
        } catch (\Exception $e) {
            //TODO: add logger - MER-10
            return self::getJsonResponse(
                ['error' => $e->getMessage()],
                512,
                'Failed to update legal info'
            );
        }

        return self::getJsonResponse(
            ['company_legal_info' => $this->companyConnectionService->getCompanyLegalInfo($company)->toArray()]
        );
    }

    private function getCompany(int $companyId): ?Company
    {
        return $this->companyService->getCompanyById($companyId);
    }

    //TODO: вынести в отдельный валидатор и переделать на эксепшены - MER-11
    private function checkPermission(?Company $company): ?JsonResponse
    {
        if (!$company) {
            return self::getJsonResponse(
                ['error' => 'Company not found'],
                Response::HTTP_NOT_FOUND,
                'Failed to request company legal info'
            );
        }

        if ($company->getUser() !== $this->tokenStorage->getToken()->getUser()) {
            return self::getJsonResponse(
                ['error' => 'You dont have access to this company'],
                Response::HTTP_FORBIDDEN,
                'Failed to request company legal info'
            );
        }

        return null;
    }

    //TODO: вынести в отдельный валидатор и переделать на эксепшены - MER-11
    private function checkFieldsUpdate(array $parameters): ?JsonResponse
    {
        $requiredFields = [
            'legal_organization_type' => 'int',
            'need_license'            => 'bool',
            'legal_properties'        => 'array'
        ];
        foreach ($requiredFields as $field => $type) {
            if (!isset($parameters[$field])) {
                return self::getJsonResponse(
                    ['error' => sprintf('Required field is missing. Field - %s', $field)],
                    Response::HTTP_BAD_REQUEST,
                    'Failed to update company legal info'
                );
            }

            if (get_debug_type($parameters[$field]) !== $type) {
                return self::getJsonResponse(
                    ['error' => sprintf('Field %s of the wrong type. The correct type - %s', $field, $type)],
                    Response::HTTP_BAD_REQUEST,
                    'Failed to update company legal info'
                );
            }
        }

        return null;
    }

    private function checkLegalProperties(
        LegalDataProvider $legalDataProvider,
        int               $companyCountryId,
        array             $legalProperties
    ): ?JsonResponse {
        $propertiesIds  = [];
        $requiredFields = [
            'legal_id' => 'int',
            'value'    => 'string'
        ];
        foreach ($legalProperties as $property) {
            foreach ($requiredFields as $field => $type) {
                if (!isset($property[$field])) {
                    return self::getJsonResponse(
                        ['error' => sprintf('Required field property is missing. Field - %s', $field)],
                        Response::HTTP_BAD_REQUEST,
                        'Failed to update company legal info'
                    );
                }

                if (get_debug_type($property[$field]) !== $type) {
                    return self::getJsonResponse(
                        ['error' => sprintf('Field %s of the wrong type. The correct type - %s', $field, $type)],
                        Response::HTTP_BAD_REQUEST,
                        'Failed to update company legal info'
                    );
                }
            }
            $propertiesIds[] = $property['legal_id'];
        }

        //проверяем, что эти юр поля соответствуют стране компании
        $templateLegalProperties = $legalDataProvider->findLegalProperties($propertiesIds);
        foreach ($templateLegalProperties as $legalProperty) {
            if ($legalProperty->getCountry()->getIso() !== $companyCountryId) {
                return self::getJsonResponse(
                    [
                        'error' => sprintf(
                            'Legal property %s is not valid for country %s',
                            $legalProperty->getId(),
                            $companyCountryId
                        )
                    ],
                    Response::HTTP_NOT_ACCEPTABLE,
                    'Failed to update company legal info'
                );
            }
        }

        return null;
    }

    private function checkLegalType(int $legalOrganizationType, ?LegalOrganisationType $legalType): ?JsonResponse
    {
        if ($legalType) {
            return null;
        }

        return self::getJsonResponse(
            ['error' => sprintf('Legal organization type %s not found', $legalOrganizationType)],
            Response::HTTP_NOT_FOUND,
            'Failed to update company legal info'
        );
    }

    private function checkLegalTypeInCountry(Company $company, LegalOrganisationType $legalTypeObj): ?JsonResponse
    {
        if ($company->getCountryId() === $legalTypeObj->getCountryId()) {
            return null;
        }

        return self::getJsonResponse(
            [
                'error' => sprintf(
                    'Legal organization type %s is not valid for country %s',
                    $legalTypeObj->getId(),
                    $company->getCountryId()
                )
            ],
            Response::HTTP_NOT_ACCEPTABLE,
            'Failed to update company legal info'
        );
    }

}