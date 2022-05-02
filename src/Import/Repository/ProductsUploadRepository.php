<?php

namespace App\Import\Repository;

use App\Import\Entity\ProductsUpload;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductsUpload|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductsUpload|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductsUpload[]    findAll()
 * @method ProductsUpload[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsUploadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductsUpload::class);
    }
}
