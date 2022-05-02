<?php

namespace App\Core\DataProvider;

use App\Core\Entity\Country;
use App\Core\Entity\Location;
use App\Core\Repository\CountryRepository;
use App\Core\Repository\LocationRepository;
use App\Core\Service\RedisCacheService;

class GeoDataProvider
{
    private const CACHE_COUNTRIES_KEY = 'geo:countries:%s';
    private const CACHE_CITIES_KEY    = 'geo:city:%s';
    private const CACHE_TTL           = 86400; // 1 day

    public function __construct(
        private CountryRepository $countryRepository,
        private LocationRepository $locationRepository,
        private RedisCacheService $cacheService,
    ) {
    }

    public function getCountries(string $orderBy = 'nameRuShort', bool $fromCache = true): array
    {
        $cacheKey = sprintf(self::CACHE_COUNTRIES_KEY, sprintf('order_list:%s', $orderBy));
        if ($fromCache) {
            $countries = $this->cacheService->get($cacheKey);
            if ($countries) {
                return $countries;
            }
        }

        $countries = $this->countryRepository->findBy([], [$orderBy => 'ASC']);
        $this->cacheService->set($cacheKey, $countries, self::CACHE_TTL);

        return $countries;
    }

    public function getCountryById(int $countryId, bool $fromCache = true): ?Country
    {
        $cacheKey = sprintf(self::CACHE_COUNTRIES_KEY, $countryId);
        if ($fromCache) {
            $country = $this->cacheService->get($cacheKey);
            if ($country) {
                return $country;
            }
        }

        $country = $this->countryRepository->findOneBy(['iso' => $countryId]);
        $this->cacheService->set($cacheKey, $country, self::CACHE_TTL);

        return $country;
    }

    public function getCityById(int $cityId, bool $fromCache = true): ?Location
    {
        $cacheKey = sprintf(self::CACHE_CITIES_KEY, $cityId);
        if ($fromCache) {
            $city = $this->cacheService->get($cacheKey);
            if ($city) {
                return $city;
            }
        }

        $city = $this->locationRepository->findOneBy(['id' => $cityId]);
        $this->cacheService->set($cacheKey, $city, self::CACHE_TTL);

        return $city;
    }

    /**
     * @return Location[]
     */
    public function getCitiesByCountry(Country $country, bool $fromCache = true): array
    {
        $cacheKey = sprintf(self::CACHE_CITIES_KEY, sprintf('country_%s', $country->getLocation()->getId()));
        if ($fromCache) {
            $cities = $this->cacheService->get($cacheKey);
            if ($cities) {
                return $cities;
            }
        }

        $cities = $this->locationRepository->findBy(
            [
                'root' => $country->getLocation(),
                'lvl'  => Location::LEVEL_CITY
            ],
            ['word' => 'ASC']
        );

        $this->cacheService->set($cacheKey, $cities, self::CACHE_TTL);

        return $cities;
    }
}