<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserSendSmsNum
 *
 * @ORM\Table(name="adv_user_send_sms_num")
 * @ORM\Entity
 */
class UserSendSmsNum
{
    /**
     * @var string
     *
     * @ORM\Column(name="num", type="string", length=21, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $num;

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

    public function getNum(): ?string
    {
        return $this->num;
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
