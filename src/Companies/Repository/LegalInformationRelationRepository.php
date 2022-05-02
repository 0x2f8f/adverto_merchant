<?php

namespace App\Companies\Repository;

use App\Companies\Entity\Company;
use App\Companies\Entity\LegalInformationRelation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LegalInformationRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method LegalInformationRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method LegalInformationRelation[]    findAll()
 * @method LegalInformationRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class LegalInformationRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LegalInformationRelation::class);
    }

    /**
     * @return LegalInformationRelation[]
     */
    public function getAssocPropertiesByCompany(Company $company): array
    {
        $qb = $this->createQueryBuilder('rels', 'rels.legalProperty')
            ->where('rels.company = :company_id')
            ->setParameter('company_id', $company->getId())
        ;

        return $qb->getQuery()->getResult();
    }
}
