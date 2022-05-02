<?php

namespace App\Import\Service;

use App\Companies\Entity\Company;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ImportService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function uploadPriceListToServer(UploadedFile $priceList, Company $company): bool
    {
        $response = $this->client->request('POST', '/api/v1/connect/price-list/upload-to-import', [
            'body' => fopen($priceList->getRealPath(), 'r'),
        ]);

        return $response->getStatusCode() === Response::HTTP_OK;
    }
}