<?php

namespace App\Import\DataProvider;

use App\Companies\Entity\Company;
use App\Import\Entity\ProductsUpload;
use App\Import\Repository\ProductsUploadRepository;

class ImportDataProvider
{
    public function __construct(
        private ProductsUploadRepository $productsUploadRepository
    ) {
    }

    /**
     * @return ProductsUpload[]
     */
    public function getUploadPriceLists(Company $company): array
    {
        return $this->productsUploadRepository->findBy(
            ['user' => $company->getUser()->getId()],
            ['createdAt' => 'ASC']
        );
    }
}