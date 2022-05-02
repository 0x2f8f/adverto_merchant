<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IntegrationRegionInfo1
 *
 * @ORM\Table(name="integration_region_info_1", indexes={@ORM\Index(name="idx_city_id", columns={"city_id"}), @ORM\Index(name="idx_district_id", columns={"district_id"})})
 * @ORM\Entity
 */
class IntegrationRegionInfo1
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="district_id", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $districtId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitude_big", type="decimal", precision=11, scale=8, nullable=true)
     */
    private $latitudeBig;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitude_big", type="decimal", precision=11, scale=8, nullable=true)
     */
    private $longitudeBig;

    /**
     * @var int
     *
     * @ORM\Column(name="city_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $cityId;

    /**
     * @var string
     *
     * @ORM\Column(name="city_name", type="string", length=255, nullable=false)
     */
    private $cityName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitude_small", type="decimal", precision=11, scale=8, nullable=true)
     */
    private $latitudeSmall;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitude_small", type="decimal", precision=11, scale=8, nullable=true)
     */
    private $longitudeSmall;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDistrictId(): ?int
    {
        return $this->districtId;
    }

    public function setDistrictId(int $districtId): self
    {
        $this->districtId = $districtId;

        return $this;
    }

    public function getLatitudeBig(): ?string
    {
        return $this->latitudeBig;
    }

    public function setLatitudeBig(?string $latitudeBig): self
    {
        $this->latitudeBig = $latitudeBig;

        return $this;
    }

    public function getLongitudeBig(): ?string
    {
        return $this->longitudeBig;
    }

    public function setLongitudeBig(?string $longitudeBig): self
    {
        $this->longitudeBig = $longitudeBig;

        return $this;
    }

    public function getCityId(): ?int
    {
        return $this->cityId;
    }

    public function setCityId(int $cityId): self
    {
        $this->cityId = $cityId;

        return $this;
    }

    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    public function setCityName(string $cityName): self
    {
        $this->cityName = $cityName;

        return $this;
    }

    public function getLatitudeSmall(): ?string
    {
        return $this->latitudeSmall;
    }

    public function setLatitudeSmall(?string $latitudeSmall): self
    {
        $this->latitudeSmall = $latitudeSmall;

        return $this;
    }

    public function getLongitudeSmall(): ?string
    {
        return $this->longitudeSmall;
    }

    public function setLongitudeSmall(?string $longitudeSmall): self
    {
        $this->longitudeSmall = $longitudeSmall;

        return $this;
    }


}
