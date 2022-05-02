<?php

namespace App\CompanyConnection\Controller;

use App\Companies\Entity\Company;
use App\Companies\Service\CompanyService;
use App\CompanyConnection\Service\CompanyConnectionService;
use App\Core\Controller\BaseApiController;
use App\Import\Service\ImportService;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[Route('/connect/price-list')]
class PriceListController extends BaseApiController
{
    public function __construct(
        private TokenStorageInterface $tokenStorage,
        private CompanyService $companyService,
        private CompanyConnectionService $companyConnectionService
    ) {
    }

    #[Route('/{companyId}', methods: ['GET'])]
    public function indexAction(int $companyId): JsonResponse
    {
        $company = $this->getCompany($companyId);
        if ($errorResponse = $this->checkPermission($company)) {
            return $errorResponse;
        }

        return self::getJsonResponse(
            [
                'price_lists' => $this->companyConnectionService->getPriceListsResponse($company),
            ]
        );
    }


    #[Route('/upload', methods: ['POST'])]
    public function uploadAction(Request $request, ImportService $importService): JsonResponse
    {
        $company = $this->companyConnectionService->getCompanyByCurrentUser();
        if ($errorResponse = $this->checkPermission($company)) {
            return $errorResponse;
        }

        /** @var UploadedFile $uploadedPriceList */
        $uploadedPriceList = $request->files->get('price-list');
        if ($errorResponse = $this->checkUploadPriceList($uploadedPriceList)) {
            return $errorResponse;
        }

        $importService->uploadPriceListToServer($uploadedPriceList, $company);
        //$uploadPriceList->getPathname()

        return self::getJsonResponse(
            [
                'price_lists' => $this->companyConnectionService->getPriceListsResponse($company),
            ]
        );
    }

    private function getCompany(int $companyId): ?Company
    {
        return $this->companyService->getCompanyById($companyId);
    }

    //TODO: вынести в отдельный валидатор и переделать на эксепшены - MER-11
    private function checkPermission(?Company $company): ?JsonResponse
    {
        if (!$company) {
            return self::getJsonResponse(
                ['error' => 'Company not found'],
                Response::HTTP_NOT_FOUND,
                'Failed to request company price lists'
            );
        }

        if ($company->getUser()->getUserIdentifier() !==
            $this->tokenStorage->getToken()->getUser()->getUserIdentifier()) {
            return self::getJsonResponse(
                ['error' => 'You dont have access to this company'],
                Response::HTTP_FORBIDDEN,
                'Failed to request company price lists'
            );
        }

        return null;
    }

    private function checkUploadPriceList(?UploadedFile $uploadedPriceList): ?JsonResponse
    {
        if ($uploadedPriceList === null) {
            return self::getJsonResponse(
                ['error' => 'File "price-list" not found'],
                Response::HTTP_BAD_REQUEST,
                'Failed to upload price list'
            );
        }

        //TODO: MER-11 - набор расширений вынести в константу, саму проверку вынести в валидатор
        if (!in_array($uploadedPriceList->getMimeType(), ['application/vnd.ms-excel'])) {
            return self::getJsonResponse(
                ['error' => 'Uploaded file extension is incorrect'],
                Response::HTTP_BAD_REQUEST,
                'Failed to upload price list'
            );
        }

        return null;
    }
}