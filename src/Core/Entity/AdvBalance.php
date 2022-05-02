<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvBalance
 *
 * @ORM\Table(name="adv_balance")
 * @ORM\Entity
 */
class AdvBalance
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="currency_id", type="integer", nullable=true)
     */
    private $currencyId;

    /**
     * @var int
     *
     * @ORM\Column(name="balance", type="integer", nullable=false)
     */
    private $balance = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="pending", type="integer", nullable=false)
     */
    private $pending = '0';

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getCurrencyId(): ?int
    {
        return $this->currencyId;
    }

    public function setCurrencyId(?int $currencyId): self
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getPending(): ?int
    {
        return $this->pending;
    }

    public function setPending(int $pending): self
    {
        $this->pending = $pending;

        return $this;
    }


}
