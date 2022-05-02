<?php

namespace App\Accounting\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountMoneyLog
 *
 * @ORM\Table(name="adv_accounts_money_log", indexes={@ORM\Index(name="user_hash", columns={"user_hash"}), @ORM\Index(name="reason_code", columns={"reason_code"})})
 * @ORM\Entity
 */
class AccountMoneyLog
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
     * @ORM\Column(name="user_hash", type="string", length=8, nullable=false)
     */
    private $userHash;

    /**
     * @var float
     *
     * @ORM\Column(name="sum", type="float", precision=10, scale=0, nullable=false)
     */
    private $sum;

    /**
     * @var int
     *
     * @ORM\Column(name="dt", type="integer", nullable=false)
     */
    private $dt;

    /**
     * @var bool
     *
     * @ORM\Column(name="reason_code", type="boolean", nullable=false, options={"comment"="0 - приход, 1 - расход"})
     */
    private $reasonCode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="reason_text", type="string", length=255, nullable=false, options={"comment"="Текст основания платежа"})
     */
    private $reasonText;

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

    public function getSum(): ?float
    {
        return $this->sum;
    }

    public function setSum(float $sum): self
    {
        $this->sum = $sum;

        return $this;
    }

    public function getDt(): ?int
    {
        return $this->dt;
    }

    public function setDt(int $dt): self
    {
        $this->dt = $dt;

        return $this;
    }

    public function getReasonCode(): ?bool
    {
        return $this->reasonCode;
    }

    public function setReasonCode(bool $reasonCode): self
    {
        $this->reasonCode = $reasonCode;

        return $this;
    }

    public function getReasonText(): ?string
    {
        return $this->reasonText;
    }

    public function setReasonText(string $reasonText): self
    {
        $this->reasonText = $reasonText;

        return $this;
    }


}
