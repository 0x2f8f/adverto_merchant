<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvCoverLinks
 *
 * @ORM\Table(name="adv_cover_links")
 * @ORM\Entity
 */
class AdvCoverLinks
{
    /**
     * @var string
     *
     * @ORM\Column(name="hash_link", type="string", length=15, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hashLink;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hash_user", type="string", length=8, nullable=true)
     */
    private $hashUser;

    /**
     * @var string
     *
     * @ORM\Column(name="firebase_link", type="string", length=600, nullable=false)
     */
    private $firebaseLink;

    /**
     * @var int
     *
     * @ORM\Column(name="timestamp", type="integer", nullable=false)
     */
    private $timestamp;

    /**
     * @var int
     *
     * @ORM\Column(name="count_view", type="integer", nullable=false)
     */
    private $countView;

    /**
     * @var int|null
     *
     * @ORM\Column(name="time_view", type="integer", nullable=true)
     */
    private $timeView;

    /**
     * @var int|null
     *
     * @ORM\Column(name="date_off", type="integer", nullable=true, options={"comment"="Когда блокировать ссылку"})
     */
    private $dateOff;

    /**
     * @var string
     *
     * @ORM\Column(name="type_of_link", type="string", length=30, nullable=false)
     */
    private $typeOfLink;

    public function getHashLink(): ?string
    {
        return $this->hashLink;
    }

    public function getHashUser(): ?string
    {
        return $this->hashUser;
    }

    public function setHashUser(?string $hashUser): self
    {
        $this->hashUser = $hashUser;

        return $this;
    }

    public function getFirebaseLink(): ?string
    {
        return $this->firebaseLink;
    }

    public function setFirebaseLink(string $firebaseLink): self
    {
        $this->firebaseLink = $firebaseLink;

        return $this;
    }

    public function getTimestamp(): ?int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getCountView(): ?int
    {
        return $this->countView;
    }

    public function setCountView(int $countView): self
    {
        $this->countView = $countView;

        return $this;
    }

    public function getTimeView(): ?int
    {
        return $this->timeView;
    }

    public function setTimeView(?int $timeView): self
    {
        $this->timeView = $timeView;

        return $this;
    }

    public function getDateOff(): ?int
    {
        return $this->dateOff;
    }

    public function setDateOff(?int $dateOff): self
    {
        $this->dateOff = $dateOff;

        return $this;
    }

    public function getTypeOfLink(): ?string
    {
        return $this->typeOfLink;
    }

    public function setTypeOfLink(string $typeOfLink): self
    {
        $this->typeOfLink = $typeOfLink;

        return $this;
    }


}
