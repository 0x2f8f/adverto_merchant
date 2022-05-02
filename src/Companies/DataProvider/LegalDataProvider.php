<?php

namespace App\Companies\DataProvider;

use App\Companies\Entity\Company;
use App\Companies\Entity\LegalInformationRelation;
use App\Companies\Entity\LegalInformationTemplate;
use App\Companies\Entity\LegalOrganisationType;
use App\Companies\Repository\LegalInformationRelationRepository;
use App\Companies\Repository\LegalInformationTemplateRepository;
use App\Companies\Repository\LegalOrganisationTypeRepository;
use App\Core\Service\RedisCacheService;

class LegalDataProvider
{
    private const CACHE_ORGANIZATION_TYPES_KEY    = 'legal:types:%s';
    private const CACHE_TEMPLATES_FOR_COUNTRY_KEY = 'legal:templates:%s';
    private const CACHE_PROPERTIES_KEY            = 'legal:properties:%s';
    private const CACHE_TTL                       = 86400; // 1 day

    public function __construct(
        private LegalInformationRelationRepository $legalInformationRelationRepository,
        private LegalInformationTemplateRepository $legalInformationTemplateRepository,
        private LegalOrganisationTypeRepository    $legalOrganisationTypeRepository,
        private RedisCacheService                  $cacheService
    ) {
    }

    public function getLegalOrganisationTypes(bool $fromCache = true): array
    {
        $cacheKey = sprintf(self::CACHE_ORGANIZATION_TYPES_KEY, 'list');
        if ($fromCache) {
            $types = $this->cacheService->get($cacheKey);
            if ($types) {
                return $types;
            }
        }

        $types = $this->legalOrganisationTypeRepository->findAll();
        $this->cacheService->set($cacheKey, $types, self::CACHE_TTL);

        return $types;
    }

    /**
     * @return LegalInformationRelation[]
     */
    public function getAssocPropertiesByCompany(Company $company): array
    {
        return $this->legalInformationRelationRepository->getAssocPropertiesByCompany($company);
    }

    /**
     * @return LegalInformationTemplate[]
     */
    public function getLegalTemplatesForCountry(int $countryId, bool $fromCache = true): array
    {
        $cacheKey = sprintf(self::CACHE_TEMPLATES_FOR_COUNTRY_KEY, $countryId);
        if ($fromCache) {
            $templates = $this->cacheService->get($cacheKey);
            if ($templates) {
                return $templates;
            }
        }

        $qb = $this->legalInformationTemplateRepository
            ->createQueryBuilder('tmplt', 'tmplt.id')
            ->where('tmplt.country = :country_id')
            ->setParameter('country_id', $countryId)
            ->orderBy('tmplt.sort', 'ASC');

        $templates = $qb->getQuery()->getResult();
        $this->cacheService->set($cacheKey, $templates, self::CACHE_TTL);

        return $templates;
    }

    public function getLegalOrganizationTypeById(int $id, bool $fromCache = true): ?LegalOrganisationType
    {
        $cacheKey = sprintf(self::CACHE_ORGANIZATION_TYPES_KEY, $id);
        if ($fromCache) {
            $type = $this->cacheService->get($cacheKey);
            if ($type) {
                return $type;
            }
        }

        $type = $this->legalOrganisationTypeRepository->findOneBy(['id' => $id]);
        $this->cacheService->set($cacheKey, $type, self::CACHE_TTL);

        return $type;
    }

    /**
     * @return LegalInformationTemplate[]
     */
    public function findLegalProperties(array $ids, bool $fromCache = true): array
    {
        $cacheKey = sprintf(self::CACHE_PROPERTIES_KEY, implode('_', $ids));
        if ($fromCache) {
            $properties = $this->cacheService->get($cacheKey);
            if ($properties) {
                return $properties;
            }
        }

        $properties = $this->legalInformationTemplateRepository->findBy(['id' => $ids]);
        $this->cacheService->set($cacheKey, $properties, self::CACHE_TTL);

        return $properties;
    }
}