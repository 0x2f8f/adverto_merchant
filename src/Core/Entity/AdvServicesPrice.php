<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvServicesPrice
 *
 * @ORM\Table(name="adv_services_price")
 * @ORM\Entity
 */
class AdvServicesPrice
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
     * @ORM\Column(name="paid_service", type="string", length=50, nullable=false)
     */
    private $paidService;

    /**
     * @var int|null
     *
     * @ORM\Column(name="category_id", type="integer", nullable=true)
     */
    private $categoryId;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="price_without_discount", type="integer", nullable=false)
     */
    private $priceWithoutDiscount = '0';

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceWithoutDiscount(): ?int
    {
        return $this->priceWithoutDiscount;
    }

    public function setPriceWithoutDiscount(int $priceWithoutDiscount): self
    {
        $this->priceWithoutDiscount = $priceWithoutDiscount;

        return $this;
    }


}
