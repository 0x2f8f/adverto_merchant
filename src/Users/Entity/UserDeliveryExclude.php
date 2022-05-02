<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserDeliveryExclude
 *
 * @ORM\Table(name="adv_user_delivery_exclude", indexes={@ORM\Index(name="user_hash_delivery_exclude_indx1", columns={"user_hash"})})
 * @ORM\Entity
 */
class UserDeliveryExclude
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
     * @ORM\Column(name="user_hash", type="string", length=8, nullable=true)
     */
    private $userHash;

    /**
     * @var int
     *
     * @ORM\Column(name="location_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $locationId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserHash(): ?string
    {
        return $this->userHash;
    }

    public function setUserHash(?string $userHash): self
    {
        $this->userHash = $userHash;

        return $this;
    }

    public function getLocationId(): ?int
    {
        return $this->locationId;
    }

    public function setLocationId(int $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


}
