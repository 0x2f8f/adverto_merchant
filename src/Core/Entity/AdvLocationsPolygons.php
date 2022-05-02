<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvLocationsPolygons
 *
 * @ORM\Table(name="adv_locations_polygons")
 * @ORM\Entity
 */
class AdvLocationsPolygons
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
     * @var multipolygon
     *
     * @ORM\Column(name="polygons", type="multipolygon", nullable=false)
     */
    private $polygons;

    public function getLocationId(): ?int
    {
        return $this->locationId;
    }

    public function getPolygons()
    {
        return $this->polygons;
    }

    public function setPolygons($polygons): self
    {
        $this->polygons = $polygons;

        return $this;
    }


}
