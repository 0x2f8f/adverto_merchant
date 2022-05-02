<?php

namespace App\Core\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseApiController extends AbstractController
{
    protected const DEFAULT_LANG = 'en';
    protected const AVAILABLE_LANGS = ['en', 'ru'];

    protected function getJsonResponse($data = [], int $status = Response::HTTP_OK, string $text = null): JsonResponse
    {
        $jsonResponse = new JsonResponse();
        $jsonResponse
            ->setData($data)
            ->setStatusCode($status, $text)
        ;
        
        return $jsonResponse;
    }
}