<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersReferralsWithdrawalOrders
 *
 * @ORM\Table(name="adv_users_referrals_withdrawal_orders", indexes={@ORM\Index(name="withdrawal_type_id", columns={"withdrawal_type_id"})})
 * @ORM\Entity
 */
class UsersReferralsWithdrawalOrders
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="hash_user", type="string", length=8, nullable=false)
     */
    private $hashUser;

    /**
     * @var int
     *
     * @ORM\Column(name="ts", type="integer", nullable=false)
     */
    private $ts;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer", nullable=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=50, nullable=false)
     */
    private $ip;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false, options={"comment"="0-не обработан, 1-проведен, 2-отказано"})
     */
    private $status = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ts_of_execution", type="integer", nullable=true, options={"comment"="Время, когда бухгалтер обработал заявку"})
     */
    private $tsOfExecution;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_comment", type="string", length=500, nullable=true)
     */
    private $userComment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="accountant_comment", type="string", length=500, nullable=true)
     */
    private $accountantComment;

    /**
     * @var int
     *
     * @ORM\Column(name="accountant", type="integer", nullable=false, options={"comment"="Бухгалтер, который осуществляет исполнение заказа"})
     */
    private $accountant;

    /**
     * @var UsersReferralsWithdrawalTypes
     *
     * @ORM\ManyToOne(targetEntity="UsersReferralsWithdrawalTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="withdrawal_type_id", referencedColumnName="id")
     * })
     */
    private $withdrawalType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHashUser(): ?string
    {
        return $this->hashUser;
    }

    public function setHashUser(string $hashUser): self
    {
        $this->hashUser = $hashUser;

        return $this;
    }

    public function getTs(): ?int
    {
        return $this->ts;
    }

    public function setTs(int $ts): self
    {
        $this->ts = $ts;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTsOfExecution(): ?int
    {
        return $this->tsOfExecution;
    }

    public function setTsOfExecution(?int $tsOfExecution): self
    {
        $this->tsOfExecution = $tsOfExecution;

        return $this;
    }

    public function getUserComment(): ?string
    {
        return $this->userComment;
    }

    public function setUserComment(?string $userComment): self
    {
        $this->userComment = $userComment;

        return $this;
    }

    public function getAccountantComment(): ?string
    {
        return $this->accountantComment;
    }

    public function setAccountantComment(?string $accountantComment): self
    {
        $this->accountantComment = $accountantComment;

        return $this;
    }

    public function getAccountant(): ?int
    {
        return $this->accountant;
    }

    public function setAccountant(int $accountant): self
    {
        $this->accountant = $accountant;

        return $this;
    }

    public function getWithdrawalType(): ?UsersReferralsWithdrawalTypes
    {
        return $this->withdrawalType;
    }

    public function setWithdrawalType(?UsersReferralsWithdrawalTypes $withdrawalType): self
    {
        $this->withdrawalType = $withdrawalType;

        return $this;
    }


}
