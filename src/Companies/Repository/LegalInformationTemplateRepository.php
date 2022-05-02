<?php

namespace App\Companies\Repository;

use App\Companies\Entity\LegalInformationTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LegalInformationTemplate|null find($id, $lockMode = null, $lockVersion = null)
 * @method LegalInformationTemplate|null findOneBy(array $criteria, array $orderBy = null)
 * @method LegalInformationTemplate[]    findAll()
 * @method LegalInformationTemplate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class LegalInformationTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LegalInformationTemplate::class);
    }
}
