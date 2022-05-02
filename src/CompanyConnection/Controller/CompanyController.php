<?php

namespace App\CompanyConnection\Controller;

use App\CompanyConnection\DTO\CompanyDTO;
use App\CompanyConnection\Service\CompanyConnectionService;
use App\Core\Controller\BaseApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/connect/company')]
class CompanyController extends BaseApiController
{
    #[Route('/', methods: ['GET'])]
    public function indexAction(CompanyConnectionService $companyConnectionService): JsonResponse
    {
        $companyDTO = $companyConnectionService->getCompanyInfo();

        return self::getJsonResponse(['company' => $companyDTO?->toArray()]);
    }

    #[Route('/', methods: ['POST'])]
    public function createAction(Request $request, CompanyConnectionService $companyConnectionService): JsonResponse
    {
        $company = $companyConnectionService->getCompanyByCurrentUser();
        if ($company) {
            //TODO: add logger - MER-10
            return self::getJsonResponse(
                ['error' => 'Company already created by current user. Use PUT method'],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                'Failed to create company'
            );
        }

        $parameters         = json_decode($request->getContent(), true);
        $parameters['user'] = $this->getUser();
        $companyDTO         = CompanyDTO::createFromClientRequestParameters($parameters);
        try {
            $result = $companyConnectionService->addedCompanyFromDTO($companyDTO);
        } catch (\Exception $e) {
            //TODO: add logger - MER-10
            return self::getJsonResponse(['error' => $e->getMessage()], 512, 'Failed to create company');
        }

        if (!$result->getCompany()) {
            //TODO: add logger - MER-10
            return self::getJsonResponse(['error' => $result->getFirstViolation()], 512, 'Failed to create company');
        }

        return self::getJsonResponse(
            ['company' => CompanyDTO::create($result->getCompany())->toArray()],
            Response::HTTP_CREATED
        );
    }

    #[Route('/', methods: ['PUT'])]
    public function updateAction(Request $request, CompanyConnectionService $companyConnectionService): JsonResponse
    {
        $company = $companyConnectionService->getCompanyByCurrentUser();
        if (!$company) {
            //TODO: add logger - MER-10
            return self::getJsonResponse(
                ['error' => 'Company by user has not yet been created. Use POST method'],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                'Failed to update company'
            );
        }

        $parameters = json_decode($request->getContent(), true);
        if ($company->getId() !== $parameters['company_id']) {
            //TODO: add logger - MER-10
            return self::getJsonResponse(
                ['error' => sprintf('You dont have access to this company. Your company %s', $company->getId())],
                Response::HTTP_FORBIDDEN,
                'Failed to update company'
            );
        }

        $parameters['user'] = $this->getUser();
        $companyDTO         = CompanyDTO::createFromClientRequestParameters($parameters);
        try {
            $result = $companyConnectionService->updateCompanyFromDTO($companyDTO, $company);
        } catch (\Exception $e) {
            //TODO: add logger - MER-10
            return self::getJsonResponse(['error' => $e->getMessage()], 512, 'Failed to update company');
        }

        if (!$result->getCompany()) {
            //TODO: add logger - MER-10
            return self::getJsonResponse(['error' => $result->getFirstViolation()], 512, 'Failed to update company');
        }

        return self::getJsonResponse(['company' => CompanyDTO::create($result->getCompany())->toArray()]);
    }

}