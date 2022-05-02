<?php

namespace App\Companies\Service;

use App\Companies\DataProvider\CompanyDataProvider;
use App\Companies\Entity\Company;
use App\CompanyConnection\DTO\CompanyDTO;
use App\Core\DataProvider\GeoDataProvider;
use App\Users\Entity\User;

class CompanyService
{
    public function __construct(
        private CompanyDataProvider $companyDataProvider,
        private GeoDataProvider $geoDataProvider,
    ) {
    }
    
    public function createCompanyFromDTO(CompanyDTO $companyDTO): ?Company
    {
        $company = $this->hydrateCompanyObj($companyDTO);

        return $this->saveCompany($company);
    }
    
    public function updateCompanyFromDTO(CompanyDTO $companyDTO, Company $company): ?Company
    {
        $company = $this->hydrateCompanyObj($companyDTO, $company);

        return $this->saveCompany($company);
    }
    
    private function hydrateCompanyObj(CompanyDTO $companyDTO, ?Company $company = null): Company
    {
        if (!$company) {
            $company = new Company();
        }
        
        if ($companyDTO->getTitle()) {
            $company->setTitle($companyDTO->getTitle());
        }

        if ($companyDTO->getCountryId()) {
            $country = $this->geoDataProvider->getCountryById($companyDTO->getCountryId());
            if ($country) {
                $company->setCountry($country);
            }
        }

        if ($companyDTO->getCityId()) {
            $city = $this->geoDataProvider->getCityById($companyDTO->getCityId());
            if ($city) {
                $company->setCity($city);
            }
        }

        if ($companyDTO->getSite()) {
            $company->setSite($companyDTO->getSite());
        }

        if (count($companyDTO->getPhones())) {
            $company->setPhones(json_encode($companyDTO->getPhones()));
        }
        
        if ($companyDTO->getManagerName()) {
            $company->setManagerName($companyDTO->getManagerName());
        }
        
        if ($companyDTO->getManagerSurname()) {
            $company->setManagerSurname($companyDTO->getManagerSurname());
        }
        
        if ($companyDTO->getManagerEmail()) {
            $company->setManagerEmail($companyDTO->getManagerEmail());
        }
        
        if ($companyDTO->getManagerPhone()) {
            $company->setManagerPhone($companyDTO->getManagerPhone());
        }

        if (!$company->getId() && $companyDTO->getUser()) {
            $company->setUser($companyDTO->getUser());
        }

        return $company;
    }
    
    public function saveCompany(Company $company): Company
    {
        return $this->companyDataProvider->save($company);
    }
    
    public function getUserCompany(User $user): ?Company
    {
        return $this->companyDataProvider->getUserCompany($user->getId());
    }

    public function getCompanyById(int $companyId): ?Company
    {
        return $this->companyDataProvider->getCompanyById($companyId);
    }
}