<?php

namespace App\Core\DTO\Response;

use App\Core\DTO\BaseDTO;
use App\Core\Entity\Location;

class CityResponseDTO extends BaseDTO
{
    public function __construct(
        protected int    $id,
        protected string $name
    ) {
    }

    public static function create(Location $city): self
    {
        return new self($city->getId(), $city->getWord());
    }
}