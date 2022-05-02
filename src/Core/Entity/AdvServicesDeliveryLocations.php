<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvServicesDeliveryLocations
 *
 * @ORM\Table(name="adv_services_delivery_locations", uniqueConstraints={@ORM\UniqueConstraint(name="code_name", columns={"delivery_id", "code_name"})}, indexes={@ORM\Index(name="index_country_id", columns={"country_id"}), @ORM\Index(name="index_city_id", columns={"city_id"}), @ORM\Index(name="index_delivery_zone", columns={"delivery_zone"}), @ORM\Index(name="index_delivery_id", columns={"delivery_id"})})
 * @ORM\Entity
 */
class AdvServicesDeliveryLocations
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
     * @ORM\Column(name="zip", type="string", length=10, nullable=true)
     */
    private $zip;

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
     * @var \AdvServicesDelivery
     *
     * @ORM\ManyToOne(targetEntity="AdvServicesDelivery")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="delivery_id", referencedColumnName="id")
     * })
     */
    private $delivery;

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

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

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

    public function getDelivery(): ?AdvServicesDelivery
    {
        return $this->delivery;
    }

    public function setDelivery(?AdvServicesDelivery $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }


}
