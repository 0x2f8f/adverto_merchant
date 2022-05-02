<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCallPhoneIp
 *
 * @ORM\Table(name="adv_user_call_phone_ip")
 * @ORM\Entity
 */
class UserCallPhoneIp
{
    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=39, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ip;

    /**
     * @var int
     *
     * @ORM\Column(name="called_at", type="integer", nullable=false)
     */
    private $calledAt;

    /**
     * @var int
     *
     * @ORM\Column(name="attempts", type="integer", nullable=false)
     */
    private $attempts;

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function getCalledAt(): ?int
    {
        return $this->calledAt;
    }

    public function setCalledAt(int $calledAt): self
    {
        $this->calledAt = $calledAt;

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


}
