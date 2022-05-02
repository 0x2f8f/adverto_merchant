<?php

namespace App\Import\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductUploadItem
 *
 * @ORM\Table(name="adv_product_item", indexes={@ORM\Index(name="idx_products_upload_id", columns={"products_upload_id"}), @ORM\Index(name="idx_status", columns={"status"})})
 * @ORM\Entity
 */
class ProductUploadItem
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="error_text", type="text", length=65535, nullable=true)
     */
    private $errorText;

    /**
     * @var int
     *
     * @ORM\Column(name="excel_row", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $excelRow;

    /**
     * @var int
     *
     * @ORM\Column(name="data_source", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $dataSource;

    /**
     * @var string|null
     *
     * @ORM\Column(name="external_data", type="text", length=0, nullable=true)
     */
    private $externalData;

    /**
     * @var string
     *
     * @ORM\Column(name="item_code", type="string", length=191, nullable=false)
     */
    private $itemCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="brand", type="string", length=191, nullable=true)
     */
    private $brand;

    /**
     * @var string|null
     *
     * @ORM\Column(name="barcode", type="string", length=191, nullable=true)
     */
    private $barcode;

    /**
     * @var string
     *
     * @ORM\Column(name="display_name", type="string", length=150, nullable=false)
     */
    private $displayName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="colours", type="string", length=255, nullable=true)
     */
    private $colours;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sizes", type="string", length=255, nullable=true)
     */
    private $sizes;

    /**
     * @var string
     *
     * @ORM\Column(name="long_description", type="text", length=65535, nullable=false)
     */
    private $longDescription;

    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $categoryId;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="price_before_discount", type="float", precision=10, scale=2, nullable=false)
     */
    private $priceBeforeDiscount;

    /**
     * @var int
     *
     * @ORM\Column(name="currency_id", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $currencyId;

    /**
     * @var float
     *
     * @ORM\Column(name="vat", type="float", precision=4, scale=2, nullable=false)
     */
    private $vat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="primary_photo", type="string", length=255, nullable=true)
     */
    private $primaryPhoto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondary_photo1", type="string", length=255, nullable=true)
     */
    private $secondaryPhoto1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondary_photo2", type="string", length=255, nullable=true)
     */
    private $secondaryPhoto2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondary_photo3", type="string", length=255, nullable=true)
     */
    private $secondaryPhoto3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondary_photo4", type="string", length=255, nullable=true)
     */
    private $secondaryPhoto4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="video", type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_link", type="string", length=255, nullable=true)
     */
    private $productLink;

    /**
     * @var float
     *
     * @ORM\Column(name="delivery", type="float", precision=10, scale=2, nullable=false)
     */
    private $delivery;

    /**
     * @var int
     *
     * @ORM\Column(name="term", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $term;

    /**
     * @var int
     *
     * @ORM\Column(name="warranty", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $warranty;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantity_in_stock", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $quantityInStock;

    /**
     * @var int|null
     *
     * @ORM\Column(name="updated_at", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $updatedAt;

    /**
     * @var \ProductsUpload
     *
     * @ORM\ManyToOne(targetEntity="ProductsUpload")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="products_upload_id", referencedColumnName="id")
     * })
     */
    private $productsUpload;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getErrorText(): ?string
    {
        return $this->errorText;
    }

    public function setErrorText(?string $errorText): self
    {
        $this->errorText = $errorText;

        return $this;
    }

    public function getExcelRow(): ?int
    {
        return $this->excelRow;
    }

    public function setExcelRow(int $excelRow): self
    {
        $this->excelRow = $excelRow;

        return $this;
    }

    public function getDataSource(): ?int
    {
        return $this->dataSource;
    }

    public function setDataSource(int $dataSource): self
    {
        $this->dataSource = $dataSource;

        return $this;
    }

    public function getExternalData(): ?string
    {
        return $this->externalData;
    }

    public function setExternalData(?string $externalData): self
    {
        $this->externalData = $externalData;

        return $this;
    }

    public function getItemCode(): ?string
    {
        return $this->itemCode;
    }

    public function setItemCode(string $itemCode): self
    {
        $this->itemCode = $itemCode;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(string $displayName): self
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getColours(): ?string
    {
        return $this->colours;
    }

    public function setColours(?string $colours): self
    {
        $this->colours = $colours;

        return $this;
    }

    public function getSizes(): ?string
    {
        return $this->sizes;
    }

    public function setSizes(?string $sizes): self
    {
        $this->sizes = $sizes;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    public function setLongDescription(string $longDescription): self
    {
        $this->longDescription = $longDescription;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceBeforeDiscount(): ?float
    {
        return $this->priceBeforeDiscount;
    }

    public function setPriceBeforeDiscount(float $priceBeforeDiscount): self
    {
        $this->priceBeforeDiscount = $priceBeforeDiscount;

        return $this;
    }

    public function getCurrencyId(): ?int
    {
        return $this->currencyId;
    }

    public function setCurrencyId(int $currencyId): self
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    public function getVat(): ?float
    {
        return $this->vat;
    }

    public function setVat(float $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function getPrimaryPhoto(): ?string
    {
        return $this->primaryPhoto;
    }

    public function setPrimaryPhoto(?string $primaryPhoto): self
    {
        $this->primaryPhoto = $primaryPhoto;

        return $this;
    }

    public function getSecondaryPhoto1(): ?string
    {
        return $this->secondaryPhoto1;
    }

    public function setSecondaryPhoto1(?string $secondaryPhoto1): self
    {
        $this->secondaryPhoto1 = $secondaryPhoto1;

        return $this;
    }

    public function getSecondaryPhoto2(): ?string
    {
        return $this->secondaryPhoto2;
    }

    public function setSecondaryPhoto2(?string $secondaryPhoto2): self
    {
        $this->secondaryPhoto2 = $secondaryPhoto2;

        return $this;
    }

    public function getSecondaryPhoto3(): ?string
    {
        return $this->secondaryPhoto3;
    }

    public function setSecondaryPhoto3(?string $secondaryPhoto3): self
    {
        $this->secondaryPhoto3 = $secondaryPhoto3;

        return $this;
    }

    public function getSecondaryPhoto4(): ?string
    {
        return $this->secondaryPhoto4;
    }

    public function setSecondaryPhoto4(?string $secondaryPhoto4): self
    {
        $this->secondaryPhoto4 = $secondaryPhoto4;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getProductLink(): ?string
    {
        return $this->productLink;
    }

    public function setProductLink(?string $productLink): self
    {
        $this->productLink = $productLink;

        return $this;
    }

    public function getDelivery(): ?float
    {
        return $this->delivery;
    }

    public function setDelivery(float $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function getTerm(): ?int
    {
        return $this->term;
    }

    public function setTerm(int $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getWarranty(): ?int
    {
        return $this->warranty;
    }

    public function setWarranty(int $warranty): self
    {
        $this->warranty = $warranty;

        return $this;
    }

    public function getQuantityInStock(): ?int
    {
        return $this->quantityInStock;
    }

    public function setQuantityInStock(?int $quantityInStock): self
    {
        $this->quantityInStock = $quantityInStock;

        return $this;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getProductsUpload(): ?ProductsUpload
    {
        return $this->productsUpload;
    }

    public function setProductsUpload(?ProductsUpload $productsUpload): self
    {
        $this->productsUpload = $productsUpload;

        return $this;
    }


}
