<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvTransactionsAdvertPurchase
 *
 * @ORM\Table(name="adv_transactions_advert_purchase")
 * @ORM\Entity
 */
class AdvTransactionsAdvertPurchase
{
    /**
     * @var string
     *
     * @ORM\Column(name="transaction_id", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $transactionId;

    /**
     * @var int
     *
     * @ORM\Column(name="advert_id", type="integer", nullable=false)
     */
    private $advertId;

    /**
     * @var string
     *
     * @ORM\Column(name="advert_title", type="string", length=100, nullable=false)
     */
    private $advertTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="advert_url", type="string", length=100, nullable=false)
     */
    private $advertUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="advert_description", type="text", length=0, nullable=false)
     */
    private $advertDescription = '';

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
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

    public function getAdvertTitle(): ?string
    {
        return $this->advertTitle;
    }

    public function setAdvertTitle(string $advertTitle): self
    {
        $this->advertTitle = $advertTitle;

        return $this;
    }

    public function getAdvertUrl(): ?string
    {
        return $this->advertUrl;
    }

    public function setAdvertUrl(string $advertUrl): self
    {
        $this->advertUrl = $advertUrl;

        return $this;
    }

    public function getAdvertDescription(): ?string
    {
        return $this->advertDescription;
    }

    public function setAdvertDescription(string $advertDescription): self
    {
        $this->advertDescription = $advertDescription;

        return $this;
    }


}
