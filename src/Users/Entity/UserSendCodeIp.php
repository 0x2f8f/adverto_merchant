<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserSendCodeIp
 *
 * @ORM\Table(name="adv_user_send_code_ip")
 * @ORM\Entity
 */
class UserSendCodeIp
{
    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=39, nullable=false, options={"comment"="с какого IP"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ip;

    /**
     * @var int
     *
     * @ORM\Column(name="timestamp", type="integer", nullable=false, options={"comment"="Время последнего обращения"})
     */
    private $timestamp;

    /**
     * @var int
     *
     * @ORM\Column(name="attempts", type="integer", nullable=false, options={"comment"="Количество попыток"})
     */
    private $attempts;

    public function getIp(): ?string
    {
        return $this->ip;
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
