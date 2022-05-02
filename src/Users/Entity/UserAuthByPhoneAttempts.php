<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAuthByPhoneAttempts
 *
 * @ORM\Table(name="adv_user_auth_by_phone_attempts")
 * @ORM\Entity
 */
class UserAuthByPhoneAttempts
{
    /**
     * @var int
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false)
     */
    private $createdAt;

    /**
     * @var int
     *
     * @ORM\Column(name="attempts", type="integer", nullable=false, options={"comment"="The number of attempts to enter a phone number"})
     */
    private $attempts;

    /**
     * @var User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_hash", referencedColumnName="hash")
     * })
     */
    private $userHash;

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAttempts(): ?int
    {
        return $this->attempts;
    }

    public function setAttempts(int $attempts): self
    {
        $this->attempts = $attempts;

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
