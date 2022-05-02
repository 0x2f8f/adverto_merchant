<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvTransactionsPaidService
 *
 * @ORM\Table(name="adv_transactions_paid_service")
 * @ORM\Entity
 */
class AdvTransactionsPaidService
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
     * @ORM\Column(name="country_id", type="integer", nullable=false)
     */
    private $countryId;

    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     */
    private $categoryId;

    /**
     * @var int
     *
     * @ORM\Column(name="count_days", type="integer", nullable=false)
     */
    private $countDays;

    /**
     * @var int
     *
     * @ORM\Column(name="visibility", type="integer", nullable=false)
     */
    private $visibility;

    /**
     * @var string
     *
     * @ORM\Column(name="paid_service", type="string", length=50, nullable=false)
     */
    private $paidService;

    /**
     * @var int
     *
     * @ORM\Column(name="advert_id", type="integer", nullable=false)
     */
    private $advertId;

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function setCountryId(int $countryId): self
    {
        $this->countryId = $countryId;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getCountDays(): ?int
    {
        return $this->countDays;
    }

    public function setCountDays(int $countDays): self
    {
        $this->countDays = $countDays;

        return $this;
    }

    public function getVisibility(): ?int
    {
        return $this->visibility;
    }

    public function setVisibility(int $visibility): self
    {
        $this->visibility = $visibility;

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

    public function getAdvertId(): ?int
    {
        return $this->advertId;
    }

    public function setAdvertId(int $advertId): self
    {
        $this->advertId = $advertId;

        return $this;
    }


}
