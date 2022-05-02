<?php

namespace App\Core\Controller;

use App\Core\DTO\Response\CityResponseDTO;
use App\Core\DTO\Response\CountryResponseDTO;
use App\Core\Entity\Country;
use App\Core\Entity\Location;
use App\Core\Service\GeoService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/geo')]
class GeoController extends BaseApiController
{
    #[Route('/countries', methods: ['GET'])]
    public function countriesAction(Request $request, GeoService $geoService): JsonResponse
    {
        $lang = $request->headers->get('lang', self::DEFAULT_LANG);
        if ($errorResponse = $this->checkLang($lang, 'Failed to get countries')) {
            return $errorResponse;
        }
        $countries = $geoService->getCountries($lang);

        return self::getJsonResponse($this->countriesToResponse($countries, $lang));
    }

    #[Route('/cities/{countryId}', methods: ['GET'])]
    public function citiesAction(int $countryId, Request $request, GeoService $geoService): JsonResponse
    {
        $lang      = $request->headers->get('lang', self::DEFAULT_LANG);
        $textError = 'Failed to get cities';
        if ($errorResponse = $this->checkLang($lang, $textError)) {
            return $errorResponse;
        }

        try {
            $country = $geoService->getCountryById($countryId);
            if ($errorResponse = $this->checkCountry($countryId, $country, $textError)) {
                return $errorResponse;
            }

            $cities = $geoService->getCitiesByCountry($country);
        } catch (\Exception $e) {
            //TODO: add logger and replace message error from response - MER-10
            return self::getJsonResponse(
                ['error' => $e->getMessage()],
                Response::HTTP_NOT_FOUND,
                $textError
            );
        }

        return self::getJsonResponse($this->citiesToResponse($cities));
    }

    /**
     * @param Country[] $countries
     * @param string $lang
     *
     * @return array
     */
    private function countriesToResponse(array $countries, string $lang): array
    {
        $result = [];
        foreach ($countries as $country) {
            $result[] = CountryResponseDTO::create($country, $lang)->toArray();
        }

        return $result;
    }

    /**
     * @param Location[] $cities
     *
     * @return array
     */
    private function citiesToResponse(array $cities): array
    {
        $result = [];
        foreach ($cities as $city) {
            $result[] = CityResponseDTO::create($city)->toArray();
        }

        return $result;
    }

    private function checkLang(string $lang, string $textError): ?JsonResponse
    {
        if (!in_array($lang, self::AVAILABLE_LANGS)) {
            return self::getJsonResponse(
                ['error' => sprintf('Lang "%s" is not supported', $lang)],
                Response::HTTP_BAD_REQUEST,
                $textError
            );
        }

        return null;
    }

    private function checkCountry(int $countryId, ?Country $country, string $textError): ?JsonResponse
    {
        if (!$country) {
            return self::getJsonResponse(
                ['error' => sprintf('Country by id "%s" not found', $countryId)],
                Response::HTTP_NOT_FOUND,
                $textError
            );
        }

        return null;
    }
}