<?php

namespace App\Accounting\Entity;

use App\Core\Entity\Currency;
use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="adv_accounts", indexes={@ORM\Index(name="currency", columns={"currency"})})
 * @ORM\Entity
 */
class Account
{
    /**
     * @var string
     *
     * @ORM\Column(name="user_hash", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userHash;

    /**
     * @var int
     *
     * @ORM\Column(name="bonus", type="integer", nullable=false)
     */
    private $bonus;

    /**
     * @var float
     *
     * @ORM\Column(name="money", type="float", precision=30, scale=2, nullable=false)
     */
    private $money;

    /**
     * @var Currency
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currency", referencedColumnName="id")
     * })
     */
    private $currency;

    public function getUserHash(): ?string
    {
        return $this->userHash;
    }

    public function getBonus(): ?int
    {
        return $this->bonus;
    }

    public function setBonus(int $bonus): self
    {
        $this->bonus = $bonus;

        return $this;
    }

    public function getMoney(): ?float
    {
        return $this->money;
    }

    public function setMoney(float $money): self
    {
        $this->money = $money;

        return $this;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }


}
