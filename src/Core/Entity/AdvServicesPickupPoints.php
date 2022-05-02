<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvServicesPickupPoints
 *
 * @ORM\Table(name="adv_services_pickup_points", uniqueConstraints={@ORM\UniqueConstraint(name="code_name", columns={"pickup_id", "code_name"})}, indexes={@ORM\Index(name="index_country_id", columns={"country_id"}), @ORM\Index(name="index_city_id", columns={"city_id"}), @ORM\Index(name="index_delivery_zone", columns={"delivery_zone"}), @ORM\Index(name="index_pickup_id", columns={"pickup_id"})})
 * @ORM\Entity
 */
class AdvServicesPickupPoints
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
     * @var string|null
     *
     * @ORM\Column(name="code_name", type="string", length=512, nullable=true)
     */
    private $codeName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uniq_name", type="string", length=512, nullable=true)
     */
    private $uniqName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_short", type="string", length=512, nullable=true)
     */
    private $addressShort;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_full", type="text", length=65535, nullable=true)
     */
    private $addressFull;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phones", type="text", length=65535, nullable=true)
     */
    private $phones;

    /**
     * @var string|null
     *
     * @ORM\Column(name="schedule", type="text", length=65535, nullable=true)
     */
    private $schedule;

    /**
     * @var point|null
     *
     * @ORM\Column(name="gps", type="point", nullable=true)
     */
    private $gps;

    /**
     * @var string|null
     *
     * @ORM\Column(name="how_to_get", type="text", length=65535, nullable=true)
     */
    private $howToGet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nearest_station", type="string", length=512, nullable=true)
     */
    private $nearestStation;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_terminal", type="boolean", nullable=false)
     */
    private $hasTerminal;

    /**
     * @var bool
     *
     * @ORM\Column(name="delivery_letters", type="boolean", nullable=false)
     */
    private $deliveryLetters;

    /**
     * @var bool
     *
     * @ORM\Column(name="delivery_parcels", type="boolean", nullable=false)
     */
    private $deliveryParcels;

    /**
     * @var bool
     *
     * @ORM\Column(name="send_letters", type="boolean", nullable=false)
     */
    private $sendLetters;

    /**
     * @var bool
     *
     * @ORM\Column(name="send_parcels", type="boolean", nullable=false)
     */
    private $sendParcels;

    /**
     * @var string|null
     *
     * @ORM\Column(name="delivery_zone", type="string", length=512, nullable=true)
     */
    private $deliveryZone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="max_weight", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $maxWeight;

    /**
     * @var string|null
     *
     * @ORM\Column(name="max_volume", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $maxVolume;

    /**
     * @var int
     *
     * @ORM\Column(name="updated_at", type="integer", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \Location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;

    /**
     * @var \Location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;

    /**
     * @var \AdvServicesPickup
     *
     * @ORM\ManyToOne(targetEntity="AdvServicesPickup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pickup_id", referencedColumnName="id")
     * })
     */
    private $pickup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeName(): ?string
    {
        return $this->codeName;
    }

    public function setCodeName(?string $codeName): self
    {
        $this->codeName = $codeName;

        return $this;
    }

    public function getUniqName(): ?string
    {
        return $this->uniqName;
    }

    public function setUniqName(?string $uniqName): self
    {
        $this->uniqName = $uniqName;

        return $this;
    }

    public function getAddressShort(): ?string
    {
        return $this->addressShort;
    }

    public function setAddressShort(?string $addressShort): self
    {
        $this->addressShort = $addressShort;

        return $this;
    }

    public function getAddressFull(): ?string
    {
        return $this->addressFull;
    }

    public function setAddressFull(?string $addressFull): self
    {
        $this->addressFull = $addressFull;

        return $this;
    }

    public function getPhones(): ?string
    {
        return $this->phones;
    }

    public function setPhones(?string $phones): self
    {
        $this->phones = $phones;

        return $this;
    }

    public function getSchedule(): ?string
    {
        return $this->schedule;
    }

    public function setSchedule(?string $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getGps()
    {
        return $this->gps;
    }

    public function setGps($gps): self
    {
        $this->gps = $gps;

        return $this;
    }

    public function getHowToGet(): ?string
    {
        return $this->howToGet;
    }

    public function setHowToGet(?string $howToGet): self
    {
        $this->howToGet = $howToGet;

        return $this;
    }

    public function getNearestStation(): ?string
    {
        return $this->nearestStation;
    }

    public function setNearestStation(?string $nearestStation): self
    {
        $this->nearestStation = $nearestStation;

        return $this;
    }

    public function getHasTerminal(): ?bool
    {
        return $this->hasTerminal;
    }

    public function setHasTerminal(bool $hasTerminal): self
    {
        $this->hasTerminal = $hasTerminal;

        return $this;
    }

    public function getDeliveryLetters(): ?bool
    {
        return $this->deliveryLetters;
    }

    public function setDeliveryLetters(bool $deliveryLetters): self
    {
        $this->deliveryLetters = $deliveryLetters;

        return $this;
    }

    public function getDeliveryParcels(): ?bool
    {
        return $this->deliveryParcels;
    }

    public function setDeliveryParcels(bool $deliveryParcels): self
    {
        $this->deliveryParcels = $deliveryParcels;

        return $this;
    }

    public function getSendLetters(): ?bool
    {
        return $this->sendLetters;
    }

    public function setSendLetters(bool $sendLetters): self
    {
        $this->sendLetters = $sendLetters;

        return $this;
    }

    public function getSendParcels(): ?bool
    {
        return $this->sendParcels;
    }

    public function setSendParcels(bool $sendParcels): self
    {
        $this->sendParcels = $sendParcels;

        return $this;
    }

    public function getDeliveryZone(): ?string
    {
        return $this->deliveryZone;
    }

    public function setDeliveryZone(?string $deliveryZone): self
    {
        $this->deliveryZone = $deliveryZone;

        return $this;
    }

    public function getMaxWeight(): ?string
    {
        return $this->maxWeight;
    }

    public function setMaxWeight(?string $maxWeight): self
    {
        $this->maxWeight = $maxWeight;

        return $this;
    }

    public function getMaxVolume(): ?string
    {
        return $this->maxVolume;
    }

    public function setMaxVolume(?string $maxVolume): self
    {
        $this->maxVolume = $maxVolume;

        return $this;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCountry(): ?Location
    {
        return $this->country;
    }

    public function setCountry(?Location $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?Location
    {
        return $this->city;
    }

    public function setCity(?Location $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPickup(): ?AdvServicesPickup
    {
        return $this->pickup;
    }

    public function setPickup(?AdvServicesPickup $pickup): self
    {
        $this->pickup = $pickup;

        return $this;
    }


}
