<?php

namespace App\Accounting\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountDetail
 *
 * @ORM\Table(name="adv_accounts_detail", indexes={@ORM\Index(name="user_hash", columns={"user_hash"}), @ORM\Index(name="reason_code", columns={"reason_code"}), @ORM\Index(name="hash_ad", columns={"hash_ad"})})
 * @ORM\Entity
 */
class AccountDetail
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
     * @var string
     *
     * @ORM\Column(name="reason_text", type="string", length=255, nullable=false, options={"comment"="Текст основания платежа"})
     */
    private $reasonText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hash_ad", type="string", length=7, nullable=true)
     */
    private $hashAd;

    /**
     * @var Costs
     *
     * @ORM\ManyToOne(targetEntity="Costs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reason_code", referencedColumnName="id")
     * })
     */
    private $reasonCode;

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

    public function getReasonText(): ?string
    {
        return $this->reasonText;
    }

    public function setReasonText(string $reasonText): self
    {
        $this->reasonText = $reasonText;

        return $this;
    }

    public function getHashAd(): ?string
    {
        return $this->hashAd;
    }

    public function setHashAd(?string $hashAd): self
    {
        $this->hashAd = $hashAd;

        return $this;
    }

    public function getReasonCode(): ?Costs
    {
        return $this->reasonCode;
    }

    public function setReasonCode(?Costs $reasonCode): self
    {
        $this->reasonCode = $reasonCode;

        return $this;
    }


}
