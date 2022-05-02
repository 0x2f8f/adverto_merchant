<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvShopAddress
 *
 * @ORM\Table(name="adv_shop_address", indexes={@ORM\Index(name="INX_HL7A568IKDKAKF", columns={"shop_id"})})
 * @ORM\Entity
 */
class AdvShopAddress
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
     * @var int|null
     *
     * @ORM\Column(name="shop_id", type="integer", nullable=true)
     */
    private $shopId;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_geo_location", type="boolean", nullable=false, options={"default"="1"})
     */
    private $hasGeoLocation = true;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var float|null
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var int|null
     *
     * @ORM\Column(name="city_id", type="integer", nullable=true)
     */
    private $cityId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="district", type="string", length=100, nullable=true)
     */
    private $district;

    /**
     * @var string|null
     *
     * @ORM\Column(name="street", type="string", length=100, nullable=true)
     */
    private $street;

    /**
     * @var string|null
     *
     * @ORM\Column(name="building", type="string", length=20, nullable=true)
     */
    private $building;

    /**
     * @var string|null
     *
     * @ORM\Column(name="building_name", type="string", length=100, nullable=true)
     */
    private $buildingName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="floor_no", type="integer", nullable=true)
     */
    private $floorNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="office_no", type="string", length=20, nullable=true)
     */
    private $officeNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zip", type="string", length=20, nullable=true)
     */
    private $zip;

    /**
     * @var array|null
     *
     * @ORM\Column(name="phones", type="array", length=0, nullable=true)
     */
    private $phones;

    /**
     * @var array|null
     *
     * @ORM\Column(name="emails", type="array", length=0, nullable=true)
     */
    private $emails;

    /**
     * @var string|null
     *
     * @ORM\Column(name="time_zone", type="string", length=255, nullable=true)
     */
    private $timeZone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShopId(): ?int
    {
        return $this->shopId;
    }

    public function setShopId(?int $shopId): self
    {
        $this->shopId = $shopId;

        return $this;
    }

    public function getHasGeoLocation(): ?bool
    {
        return $this->hasGeoLocation;
    }

    public function setHasGeoLocation(bool $hasGeoLocation): self
    {
        $this->hasGeoLocation = $hasGeoLocation;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getCityId(): ?int
    {
        return $this->cityId;
    }

    public function setCityId(?int $cityId): self
    {
        $this->cityId = $cityId;

        return $this;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setDistrict(?string $district): self
    {
        $this->district = $district;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getBuilding(): ?string
    {
        return $this->building;
    }

    public function setBuilding(?string $building): self
    {
        $this->building = $building;

        return $this;
    }

    public function getBuildingName(): ?string
    {
        return $this->buildingName;
    }

    public function setBuildingName(?string $buildingName): self
    {
        $this->buildingName = $buildingName;

        return $this;
    }

    public function getFloorNo(): ?int
    {
        return $this->floorNo;
    }

    public function setFloorNo(?int $floorNo): self
    {
        $this->floorNo = $floorNo;

        return $this;
    }

    public function getOfficeNo(): ?string
    {
        return $this->officeNo;
    }

    public function setOfficeNo(?string $officeNo): self
    {
        $this->officeNo = $officeNo;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getPhones(): ?array
    {
        return $this->phones;
    }

    public function setPhones(?array $phones): self
    {
        $this->phones = $phones;

        return $this;
    }

    public function getEmails(): ?array
    {
        return $this->emails;
    }

    public function setEmails(?array $emails): self
    {
        $this->emails = $emails;

        return $this;
    }

    public function getTimeZone(): ?string
    {
        return $this->timeZone;
    }

    public function setTimeZone(?string $timeZone): self
    {
        $this->timeZone = $timeZone;

        return $this;
    }


}
