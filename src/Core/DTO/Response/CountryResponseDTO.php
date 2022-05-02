<?php

namespace App\Core\DTO\Response;

use App\Core\DTO\BaseDTO;
use App\Core\Entity\Country;

class CountryResponseDTO extends BaseDTO
{
    public function __construct(
        protected int    $id,
        protected string $name
    ) {
    }

    public static function create(Country $country, string $lang): self
    {
        $name = match ($lang) {
            'ru'    => $country->getNameRuShort(),
            default => $country->getNameEn()
        };

        return new self($country->getIso(), $name);
    }
}