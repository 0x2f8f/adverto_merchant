<?php

namespace App\CompanyConnection\Service;

use App\Companies\DataProvider\LegalDataProvider;
use App\Companies\Entity\Company;
use App\Companies\Entity\LegalInformationRelation;
use App\Companies\Entity\LegalOrganisationType;
use App\Companies\Service\CompanyService;
use App\CompanyConnection\DTO\CompanyDTO;
use App\CompanyConnection\DTO\CompanyModifyResultDTO;
use App\CompanyConnection\DTO\LegalInfoDTO;
use App\CompanyConnection\DTO\LegalOrganisationTypeDTO;
use App\CompanyConnection\DTO\LegalPropertyDTO;
use App\CompanyConnection\DTO\PriceListDTO;
use App\CompanyConnection\DTO\StepsDTO;
use App\CompanyConnection\Validator\CompanyValidator;
use App\Import\DataProvider\ImportDataProvider;
use App\Import\Entity\ProductsUpload;
use App\Users\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class CompanyConnectionService
{
    public function __construct(
        private TokenStorageInterface $tokenStorage,
        private CompanyValidator      $companyValidator,
        private CompanyService        $companyService,
        private LegalDataProvider     $legalDataProvider,
        private ImportDataProvider    $importDataProvider,
    ) {
    }

    public function getCompanyByCurrentUser(): ?Company
    {
        return $this->companyService->getUserCompany($this->getCurrentUser());
    }

    public function getSteps(): StepsDTO
    {
        $steps = new StepsDTO();
        $steps->getGeneral()->setAvailable(true);

        $company = $this->getCompanyByCurrentUser();
        if (!$company) {
            return $steps;
        }

        if ($company->getTitle()) {
            $steps->getGeneral()->setIsFilled(true);
        }

        return $steps;
    }

    public function getCompanyInfo(): ?CompanyDTO
    {
        $company = $this->getCompanyByCurrentUser();
        if (!$company) {
            return null;
        }

        return CompanyDTO::create($company);
    }

    public function getCompanyLegalInfo(Company $company): LegalInfoDTO
    {
        $legalInfoDTO = LegalInfoDTO::create($company);

        //получаем набор полей по стране организации
        $legalFields = $this->legalDataProvider->getLegalTemplatesForCountry($company->getCountryId());

        if (!count($legalFields)) {
            return $legalInfoDTO;
        }

        //получаем юр.значения полей компании
        $companyLegalFields = $this->legalDataProvider->getAssocPropertiesByCompany($company);

        //формируем юр.поля
        foreach ($legalFields as $legalField) {
            $companyProperty = $companyLegalFields[$legalField->getId()] ?? new LegalInformationRelation();
            $legalInfoDTO->addLegalProperty(
                LegalPropertyDTO::create($legalField, $companyProperty)
            );
        }

        return $legalInfoDTO;
    }

    public function addedCompanyFromDTO(CompanyDTO $companyDTO): ?CompanyModifyResultDTO
    {
        $errors = $this->companyValidator->validateCompanyInfo($companyDTO, CompanyValidator::PRESENTATION_TYPE_CREATE);

        if ($errors->count() > 0) {
            return CompanyModifyResultDTO::createFail($errors);
        }

        $company = $this->companyService->createCompanyFromDTO($companyDTO);
        if (!$company) {
            throw new \Exception('Error saving company', 512);
        }

        return CompanyModifyResultDTO::createSuccess($company);
    }

    public function updateCompanyFromDTO(CompanyDTO $companyDTO, Company $company): ?CompanyModifyResultDTO
    {
        $errors = $this->companyValidator->validateCompanyInfo($companyDTO, CompanyValidator::PRESENTATION_TYPE_UPDATE);

        if ($errors->count() > 0) {
            return CompanyModifyResultDTO::createFail($errors);
        }

        $company = $this->companyService->updateCompanyFromDTO($companyDTO, $company);
        if (!$company) {
            throw new \Exception('Error saving company', 512);
        }

        return CompanyModifyResultDTO::createSuccess($company);
    }

    /**
     * @return User
     */
    private function getCurrentUser(): ?UserInterface
    {
        $token = $this->tokenStorage->getToken();
        if ($token instanceof TokenInterface) {
            return $token->getUser();
        }

        return null;
    }

    public function getLegalOrganisationTypes(): array
    {
        $types = $this->legalDataProvider->getLegalOrganisationTypes();
        if (!count($types)) {
            return [];
        }

        $result = [];
        foreach ($types as $type) {
            $result[$type->getSlug()] = LegalOrganisationTypeDTO::create($type)->toArray();
        }

        return $result;
    }

    public function updateCompanyLegalInfo(
        Company               $company,
        LegalOrganisationType $legalTypeObj,
        bool                  $needLicense,
        array                 $legalProperties
    ): Company {
        $companyLegalFields      = $this->legalDataProvider->getAssocPropertiesByCompany($company);
        $templateLegalProperties = $this->legalDataProvider->getLegalTemplatesForCountry($company->getCountryId());

        foreach ($legalProperties as $property) {
            if (isset($companyLegalFields[$property['legal_id']])) {
                $companyLegalField = $companyLegalFields[$property['legal_id']];
            } else {
                $companyLegalField = new LegalInformationRelation();
                $companyLegalField
                    ->setCompany($company)
                    ->setLegalProperty($templateLegalProperties[$property['legal_id']]);
            }
            $companyLegalField->setLegalContent($property['value']);
        }

        $company
            ->setLicense($needLicense ? '1' : null)
            ->setLegalOrganisationType($legalTypeObj);

        return $this->companyService->saveCompany($company);
    }

    /**
     * @return ProductsUpload[]
     */
    public function getPriceListsResponse(Company $company): array
    {
        $priceLists = $this->importDataProvider->getUploadPriceLists($company);
        $result = [];
        foreach ($priceLists as $priceList) {
            $result[]=PriceListDTO::create($priceList)->toArray();
        }

        return $result;
    }
}