<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvTelegramClientSessions
 *
 * @ORM\Table(name="adv_telegram_client_sessions", uniqueConstraints={@ORM\UniqueConstraint(name="user_hash", columns={"user_hash"}), @ORM\UniqueConstraint(name="phone", columns={"phone"})})
 * @ORM\Entity
 */
class AdvTelegramClientSessions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user_hash", type="string", length=11, nullable=false)
     */
    private $userHash;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="session", type="text", length=65535, nullable=false)
     */
    private $session;

    /**
     * @var int
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false)
     */
    private $createdAt;

    public function getId(): ?string
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getSession(): ?string
    {
        return $this->session;
    }

    public function setSession(string $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


}
