<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCallPhone
 *
 * @ORM\Table(name="adv_user_call_phone")
 * @ORM\Entity
 */
class UserCallPhone
{
    /**
     * @var string
     *
     * @ORM\Column(name="num_for_auth", type="string", length=21, nullable=false, options={"comment"="Phone number from which you need to make a call for authorization"})
     */
    private $numForAuth;

    /**
     * @var int
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false)
     */
    private $createdAt;

    /**
     * @var int
     *
     * @ORM\Column(name="start_period_at", type="integer", nullable=false, options={"comment"="Call time to track the number of attempts over a period of time"})
     */
    private $startPeriodAt;

    /**
     * @var int
     *
     * @ORM\Column(name="last_call_at", type="integer", nullable=false, options={"comment"="Time of the last call request"})
     */
    private $lastCallAt;

    /**
     * @var int
     *
     * @ORM\Column(name="attempts", type="integer", nullable=false, options={"comment"="The number of attempts to get call"})
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

    public function getNumForAuth(): ?string
    {
        return $this->numForAuth;
    }

    public function setNumForAuth(string $numForAuth): self
    {
        $this->numForAuth = $numForAuth;

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

    public function getStartPeriodAt(): ?int
    {
        return $this->startPeriodAt;
    }

    public function setStartPeriodAt(int $startPeriodAt): self
    {
        $this->startPeriodAt = $startPeriodAt;

        return $this;
    }

    public function getLastCallAt(): ?int
    {
        return $this->lastCallAt;
    }

    public function setLastCallAt(int $lastCallAt): self
    {
        $this->lastCallAt = $lastCallAt;

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
