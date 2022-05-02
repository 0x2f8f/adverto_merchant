<?php

namespace App\Adverts\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertsComplains
 *
 * @ORM\Table(name="adv_adverts_complains", indexes={@ORM\Index(name="reason_id", columns={"reason_id"})})
 * @ORM\Entity
 */
class AdvertsComplains
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user_hash", type="string", length=8, nullable=false)
     */
    private $userHash;

    /**
     * @var string
     *
     * @ORM\Column(name="hash_advert", type="string", length=8, nullable=false)
     */
    private $hashAdvert;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var AdvertsComplainReasons
     *
     * @ORM\ManyToOne(targetEntity="AdvertsComplainReasons")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reason_id", referencedColumnName="id")
     * })
     */
    private $reason;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserHash(): ?string
    {
        return $this->userHash;
    }

    public function setUserHash(string $userHash): self
    {
        $this->userHash = $userHash;

        return $this;
    }

    public function getHashAdvert(): ?string
    {
        return $this->hashAdvert;
    }

    public function setHashAdvert(string $hashAdvert): self
    {
        $this->hashAdvert = $hashAdvert;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getReason(): ?AdvertsComplainReasons
    {
        return $this->reason;
    }

    public function setReason(?AdvertsComplainReasons $reason): self
    {
        $this->reason = $reason;

        return $this;
    }


}
