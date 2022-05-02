<?php

namespace App\Core\Service;

use App\Core\DataProvider\GeoDataProvider;
use App\Core\Entity\Country;

class GeoService
{
    public function __construct(
        private GeoDataProvider $geoDataProvider
    ) {
    }

    public function getCountries(string $lang = null): array
    {
        $orderBy = match ($lang) {
            'ru'    => 'nameRuShort',
            default => 'nameEn'
        };

        return $this->geoDataProvider->getCountries($orderBy);
    }

    public function getCountryById(int $countryId): ?Country
    {
        return $this->geoDataProvider->getCountryById($countryId);
    }

    public function getCitiesByCountry(Country $country): array
    {
        return $this->geoDataProvider->getCitiesByCountry($country);
    }
}