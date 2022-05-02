<?php

namespace App\Companies\DataProvider;

use App\Companies\Entity\Company;
use App\Companies\Repository\CompanyRepository;
use App\Core\Service\RedisCacheService;
use Doctrine\ORM\EntityManagerInterface;

class CompanyDataProvider
{
    private const CACHE_COMPANIES_USER_KEY = 'companies:user:%s';
    private const CACHE_COMPANIES_ID_KEY   = 'companies:id:%s';
    private const CACHE_TTL                = 86400; // 1 day

    public function __construct(
        private CompanyRepository      $companyRepository,
        private EntityManagerInterface $entityManager,
        private RedisCacheService      $cacheService,
    ) {
    }

    public function save(Company $company, bool $clearCache = true): Company
    {
        $this->entityManager->persist($company);
        $this->entityManager->flush();

        if ($clearCache && $company->getId()) {
            $this->saveCompanyToCache($company);
        }

        return $company;
    }

    public function getUserCompany(int $userId, bool $fromCache = true): ?Company
    {
        $cacheKey = sprintf(self::CACHE_COMPANIES_USER_KEY, $userId);
        if ($fromCache) {
            $company = $this->cacheService->get($cacheKey);
            if ($company) {
                return $company;
            }
        }

        $company = $this->companyRepository->findOneBy(['user' => $userId]);
        $this->cacheService->set($cacheKey, $company, self::CACHE_TTL);

        return $company;
    }

    public function getCompanyById(int $companyId, bool $fromCache = true): ?Company
    {
        $cacheKey = sprintf(self::CACHE_COMPANIES_ID_KEY, $companyId);
        if ($fromCache) {
            $company = $this->cacheService->get($cacheKey);
            if ($company) {
                return $company;
            }
        }

        $company = $this->companyRepository->findOneBy(['id' => $companyId]);
        $this->cacheService->set($cacheKey, $company, self::CACHE_TTL);

        return $company;
    }

    private function saveCompanyToCache(Company $company): bool
    {
        $cacheKey = sprintf(self::CACHE_COMPANIES_ID_KEY, $company->getId());
        return $this->cacheService->set($cacheKey, $company, self::CACHE_TTL);
    }
}