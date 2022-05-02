<?php

namespace App\Users\Entity;

use App\Core\Entity\Location;
use App\Core\Entity\Country;
use Doctrine\ORM\Mapping as ORM;

/**
 * UsersAddresses
 *
 * @ORM\Table(name="adv_users_addresses", indexes={@ORM\Index(name="city", columns={"city"}), @ORM\Index(name="country", columns={"country"}), @ORM\Index(name="user_hash", columns={"user_hash"})})
 * @ORM\Entity
 */
class UsersAddresses
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
     * @ORM\Column(name="name", type="string", length=100, nullable=true, options={"comment"="not used"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address_text", type="text", length=65535, nullable=false)
     */
    private $addressText;

    /**
     * @var point|null
     *
     * @ORM\Column(name="gps", type="point", nullable=true)
     */
    private $gps;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_main", type="boolean", nullable=false)
     */
    private $isMain;

    /**
     * @var int
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country", referencedColumnName="iso")
     * })
     */
    private $country;

    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city", referencedColumnName="id")
     * })
     */
    private $city;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_hash", referencedColumnName="hash")
     * })
     */
    private $userHash;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddressText(): ?string
    {
        return $this->addressText;
    }

    public function setAddressText(string $addressText): self
    {
        $this->addressText = $addressText;

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

    public function getIsMain(): ?bool
    {
        return $this->isMain;
    }

    public function setIsMain(bool $isMain): self
    {
        $this->isMain = $isMain;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
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

    public function getUserHash(): ?User
    {
        return $this->userHash;
    }

    public function setUserHash(?User $userHash): self
    {
        $this->userHash = $userHash;

        return $this;
    }


}
