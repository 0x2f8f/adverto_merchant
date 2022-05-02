<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvPaidServiceActive
 *
 * @ORM\Table(name="adv_paid_service_active")
 * @ORM\Entity
 */
class AdvPaidServiceActive
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
     * @var int
     *
     * @ORM\Column(name="advert_id", type="integer", nullable=false)
     */
    private $advertId;

    /**
     * @var string
     *
     * @ORM\Column(name="paid_service", type="string", length=50, nullable=false)
     */
    private $paidService;

    /**
     * @var string|null
     *
     * @ORM\Column(name="transaction_id", type="string", length=50, nullable=true)
     */
    private $transactionId;

    /**
     * @var int
     *
     * @ORM\Column(name="since", type="integer", nullable=false)
     */
    private $since;

    /**
     * @var int
     *
     * @ORM\Column(name="until", type="integer", nullable=false)
     */
    private $until;

    /**
     * @var int
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false)
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdvertId(): ?int
    {
        return $this->advertId;
    }

    public function setAdvertId(int $advertId): self
    {
        $this->advertId = $advertId;

        return $this;
    }

    public function getPaidService(): ?string
    {
        return $this->paidService;
    }

    public function setPaidService(string $paidService): self
    {
        $this->paidService = $paidService;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    public function getSince(): ?int
    {
        return $this->since;
    }

    public function setSince(int $since): self
    {
        $this->since = $since;

        return $this;
    }

    public function getUntil(): ?int
    {
        return $this->until;
    }

    public function setUntil(int $until): self
    {
        $this->until = $until;

        return $this;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


}
