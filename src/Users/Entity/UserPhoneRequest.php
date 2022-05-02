<?php

namespace App\Users\Entity;

use App\Adverts\Entity\Advert;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserPhoneRequest
 *
 * @ORM\Table(name="adv_user_phone_request", indexes={@ORM\Index(name="adv_user_phone_request_users", columns={"user_hash"}), @ORM\Index(name="adv_user_phone_request_adverts", columns={"advert_hash"})})
 * @ORM\Entity
 */
class UserPhoneRequest
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_hash", referencedColumnName="hash")
     * })
     */
    private $userHash;

    /**
     * @var Advert
     *
     * @ORM\ManyToOne(targetEntity="App\Adverts\Entity\Advert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="advert_hash", referencedColumnName="hash")
     * })
     */
    private $advertHash;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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

    public function getAdvertHash(): ?Advert
    {
        return $this->advertHash;
    }

    public function setAdvertHash(?Advert $advertHash): self
    {
        $this->advertHash = $advertHash;

        return $this;
    }


}
