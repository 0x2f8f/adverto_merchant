<?php

namespace App\CompanyConnection\Controller;

use App\CompanyConnection\Service\CompanyConnectionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/connect')]
class ConnectionController extends AbstractController
{
    #[Route('/')]
    public function connectAction(CompanyConnectionService $companyConnectionService): JsonResponse
    {
        $stepsDTO = $companyConnectionService->getSteps();

        return new JsonResponse($stepsDTO->toArray());
    }

}