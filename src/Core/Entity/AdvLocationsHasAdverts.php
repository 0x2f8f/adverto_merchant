<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvLocationsHasAdverts
 *
 * @ORM\Table(name="adv_locations_has_adverts")
 * @ORM\Entity
 */
class AdvLocationsHasAdverts
{
    /**
     * @var int
     *
     * @ORM\Column(name="location_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $locationId;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_adverts", type="boolean", nullable=false)
     */
    private $hasAdverts = '0';

    public function getLocationId(): ?int
    {
        return $this->locationId;
    }

    public function getHasAdverts(): ?bool
    {
        return $this->hasAdverts;
    }

    public function setHasAdverts(bool $hasAdverts): self
    {
        $this->hasAdverts = $hasAdverts;

        return $this;
    }


}
