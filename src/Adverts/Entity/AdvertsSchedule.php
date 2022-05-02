<?php

namespace App\Adverts\Entity;

use App\Core\Entity\Currency;
use App\Users\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertsSchedule
 *
 * @ORM\Table(name="adv_adverts_schedule", indexes={@ORM\Index(name="next_date_act", columns={"next_date_act"}), @ORM\Index(name="user_hash", columns={"user_hash"}), @ORM\Index(name="money_currency", columns={"money_currency"}), @ORM\Index(name="date_last", columns={"date_last"}), @ORM\Index(name="IDX_DBCCCD05F7A4D2DA", columns={"hash_ad"})})
 * @ORM\Entity
 */
class AdvertsSchedule
{
    /**
     * @var bool
     *
     * @ORM\Column(name="type_oper", type="boolean", nullable=false, options={"comment"="1-поднятие, 2-выделение"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $typeOper;

    /**
     * @var int
     *
     * @ORM\Column(name="date_begin", type="integer", nullable=false)
     */
    private $dateBegin;

    /**
     * @var int
     *
     * @ORM\Column(name="date_last", type="integer", nullable=false)
     */
    private $dateLast;

    /**
     * @var int
     *
     * @ORM\Column(name="last_date_act", type="integer", nullable=false, options={"comment"="дата последнего действия (поднятия или выделения)"})
     */
    private $lastDateAct;

    /**
     * @var int
     *
     * @ORM\Column(name="next_date_act", type="integer", nullable=false, options={"comment"="Дата следующего действия"})
     */
    private $nextDateAct;

    /**
     * @var int
     *
     * @ORM\Column(name="cost_bonus", type="integer", nullable=false, options={"comment"="Цена одной операции в бонусах"})
     */
    private $costBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="cost_money", type="float", precision=10, scale=0, nullable=false, options={"comment"="стоимость в деньгах"})
     */
    private $costMoney;

    /**
     * @var bool
     *
     * @ORM\Column(name="pay_account_priority", type="boolean", nullable=false, options={"comment"="Приоритет счета, с которого оплачивать: 1-бонусный, 2-денежный"})
     */
    private $payAccountPriority;

    /**
     * @var Currency
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="money_currency", referencedColumnName="id")
     * })
     */
    private $moneyCurrency;

    /**
     * @var User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Users\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_hash", referencedColumnName="hash")
     * })
     */
    private $userHash;

    /**
     * @var Advert
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Advert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hash_ad", referencedColumnName="hash")
     * })
     */
    private $hashAd;

    public function getTypeOper(): ?bool
    {
        return $this->typeOper;
    }

    public function getDateBegin(): ?int
    {
        return $this->dateBegin;
    }

    public function setDateBegin(int $dateBegin): self
    {
        $this->dateBegin = $dateBegin;

        return $this;
    }

    public function getDateLast(): ?int
    {
        return $this->dateLast;
    }

    public function setDateLast(int $dateLast): self
    {
        $this->dateLast = $dateLast;

        return $this;
    }

    public function getLastDateAct(): ?int
    {
        return $this->lastDateAct;
    }

    public function setLastDateAct(int $lastDateAct): self
    {
        $this->lastDateAct = $lastDateAct;

        return $this;
    }

    public function getNextDateAct(): ?int
    {
        return $this->nextDateAct;
    }

    public function setNextDateAct(int $nextDateAct): self
    {
        $this->nextDateAct = $nextDateAct;

        return $this;
    }

    public function getCostBonus(): ?int
    {
        return $this->costBonus;
    }

    public function setCostBonus(int $costBonus): self
    {
        $this->costBonus = $costBonus;

        return $this;
    }

    public function getCostMoney(): ?float
    {
        return $this->costMoney;
    }

    public function setCostMoney(float $costMoney): self
    {
        $this->costMoney = $costMoney;

        return $this;
    }

    public function getPayAccountPriority(): ?bool
    {
        return $this->payAccountPriority;
    }

    public function setPayAccountPriority(bool $payAccountPriority): self
    {
        $this->payAccountPriority = $payAccountPriority;

        return $this;
    }

    public function getMoneyCurrency(): ?Currency
    {
        return $this->moneyCurrency;
    }

    public function setMoneyCurrency(?Currency $moneyCurrency): self
    {
        $this->moneyCurrency = $moneyCurrency;

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

    public function getHashAd(): ?Advert
    {
        return $this->hashAd;
    }

    public function setHashAd(?Advert $hashAd): self
    {
        $this->hashAd = $hashAd;

        return $this;
    }


}
