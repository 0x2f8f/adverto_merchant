<?php

namespace App\Adverts\Entity;

use App\Users\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Drafts
 *
 * @ORM\Table(name="adv_drafts", uniqueConstraints={@ORM\UniqueConstraint(name="adv_drafts_id_UN", columns={"id"}), @ORM\UniqueConstraint(name="adv_drafts_temp_user_id_UN", columns={"temp_user_id"})}, indexes={@ORM\Index(name="adv_drafts_user_hash_IDX", columns={"user_hash"}), @ORM\Index(name="adv_drafts_temp_user_id_IDX", columns={"temp_user_id"})})
 * @ORM\Entity
 */
class Drafts
{
    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=7, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hash;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="date_created", type="integer", nullable=false)
     */
    private $dateCreated;

    /**
     * @var string|null
     *
     * @ORM\Column(name="temp_user_id", type="string", length=100, nullable=true)
     */
    private $tempUserId;

    /**
     * @var string
     *
     * @ORM\Column(name="raw_data", type="text", length=0, nullable=false)
     */
    private $rawData;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Users\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_hash", referencedColumnName="hash")
     * })
     */
    private $userHash;

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDateCreated(): ?int
    {
        return $this->dateCreated;
    }

    public function setDateCreated(int $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getTempUserId(): ?string
    {
        return $this->tempUserId;
    }

    public function setTempUserId(?string $tempUserId): self
    {
        $this->tempUserId = $tempUserId;

        return $this;
    }

    public function getRawData(): ?string
    {
        return $this->rawData;
    }

    public function setRawData(string $rawData): self
    {
        $this->rawData = $rawData;

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
