<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvTransactions
 *
 * @ORM\Table(name="adv_transactions")
 * @ORM\Entity
 */
class AdvTransactions
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state", type="string", length=10, nullable=true, options={"default"="NEW"})
     */
    private $state = 'NEW';

    /**
     * @var string
     *
     * @ORM\Column(name="direction", type="string", length=10, nullable=false)
     */
    private $direction;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="order_id", type="string", length=50, nullable=true)
     */
    private $orderId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="related", type="string", length=50, nullable=true)
     */
    private $related;

    /**
     * @var int|null
     *
     * @ORM\Column(name="amount", type="integer", nullable=true)
     */
    private $amount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="currency_id", type="integer", nullable=true)
     */
    private $currencyId;

    /**
     * @var float|null
     *
     * @ORM\Column(name="currency_quote", type="float", precision=10, scale=0, nullable=true)
     */
    private $currencyQuote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="error", type="string", length=200, nullable=true)
     */
    private $error;

    /**
     * @var int|null
     *
     * @ORM\Column(name="created_at", type="integer", nullable=true)
     */
    private $createdAt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="state_updated_at", type="integer", nullable=true)
     */
    private $stateUpdatedAt;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getDirection(): ?string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(?string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRelated(): ?string
    {
        return $this->related;
    }

    public function setRelated(?string $related): self
    {
        $this->related = $related;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
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

    public function getCurrencyQuote(): ?float
    {
        return $this->currencyQuote;
    }

    public function setCurrencyQuote(?float $currencyQuote): self
    {
        $this->currencyQuote = $currencyQuote;

        return $this;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function setError(?string $error): self
    {
        $this->error = $error;

        return $this;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getStateUpdatedAt(): ?int
    {
        return $this->stateUpdatedAt;
    }

    public function setStateUpdatedAt(?int $stateUpdatedAt): self
    {
        $this->stateUpdatedAt = $stateUpdatedAt;

        return $this;
    }


}
