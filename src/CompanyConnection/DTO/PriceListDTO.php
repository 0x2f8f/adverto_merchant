<?php

namespace App\CompanyConnection\DTO;

use App\Core\DTO\BaseDTO;
use App\Core\Traits\MethodTrait;
use App\Import\Entity\ProductsUpload;
use JetBrains\PhpStorm\Pure;

/**
 * @method getId(): ?int
 * @method getFilename(): ?string
 * @method getStatus(): ?int
 * @method getDeclineReason(): ?string
 * @method getProductsTotal(): ?int
 * @method getProductsSuccess(): ?int
 * @method getProductsWarning(): ?int
 * @method getProductsError(): ?int
 * @method getCreatedAt(): ?string
 */
class PriceListDTO extends BaseDTO
{
    use MethodTrait;

    protected int $id;

    protected string $filename;

    protected int $status;

    protected ?string $declineReason;

    protected int $productsTotal;

    protected int $productsSuccess;

    protected int $productsWarning;

    protected int $productsError;

    protected string $createdAt;

    protected string $moderatedAt;

    #[Pure]
    public static function create(ProductsUpload $priceList): self
    {
        $self                  = new self();
        $self->id              = $priceList->getId();
        $self->filename        = $priceList->getFilename();
        $self->status          = $priceList->getStatus();
        $self->declineReason   = $priceList->getDeclineReason();
        $self->productsTotal   = $priceList->getCountProdsTotal();
        $self->productsSuccess = $priceList->getCountProdsSuccess();
        $self->productsWarning = $priceList->getCountProdsWarning();
        $self->productsError   = $priceList->getCountProdsError();
        $self->createdAt       = $priceList->getCreated()->format('d.m.Y H:i');

        if ($priceList->getModerated()) {
            $self->moderatedAt = $priceList->getModerated()->format('d.m.Y H:i');
        }

        return $self;
    }
}