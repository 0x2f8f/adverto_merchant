<?php

namespace App\Companies\Repository;

use App\Companies\Entity\LegalOrganisationType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LegalOrganisationType|null find($id, $lockMode = null, $lockVersion = null)
 * @method LegalOrganisationType|null findOneBy(array $criteria, array $orderBy = null)
 * @method LegalOrganisationType[]    findAll()
 * @method LegalOrganisationType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class LegalOrganisationTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LegalOrganisationType::class);
    }
}
