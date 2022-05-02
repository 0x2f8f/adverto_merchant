<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersReferralsAccountsHistory
 *
 * @ORM\Table(name="adv_users_referrals_accounts_history", indexes={@ORM\Index(name="adv_users_referrals_accounts_history_ibfk_1", columns={"withdrawal_order_id"})})
 * @ORM\Entity
 */
class UsersReferralsAccountsHistory
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
     * @var int
     *
     * @ORM\Column(name="ts", type="integer", nullable=false)
     */
    private $ts;

    /**
     * @var string
     *
     * @ORM\Column(name="hash_user", type="string", length=8, nullable=false)
     */
    private $hashUser;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer", nullable=false)
     */
    private $amount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pay_for_user", type="string", length=8, nullable=true)
     */
    private $payForUser;

    /**
     * @var UsersReferralsWithdrawalOrders
     *
     * @ORM\ManyToOne(targetEntity="UsersReferralsWithdrawalOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="withdrawal_order_id", referencedColumnName="id")
     * })
     */
    private $withdrawalOrder;

    public function getId(): ?string
    {
        return $this->id;
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

    public function getHashUser(): ?string
    {
        return $this->hashUser;
    }

    public function setHashUser(string $hashUser): self
    {
        $this->hashUser = $hashUser;

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

    public function getPayForUser(): ?string
    {
        return $this->payForUser;
    }

    public function setPayForUser(?string $payForUser): self
    {
        $this->payForUser = $payForUser;

        return $this;
    }

    public function getWithdrawalOrder(): ?UsersReferralsWithdrawalOrders
    {
        return $this->withdrawalOrder;
    }

    public function setWithdrawalOrder(?UsersReferralsWithdrawalOrders $withdrawalOrder): self
    {
        $this->withdrawalOrder = $withdrawalOrder;

        return $this;
    }


}
