<?php

namespace App\CompanyConnection\DTO;

use App\Companies\Entity\LegalInformationRelation;
use App\Companies\Entity\LegalInformationTemplate;
use App\Core\DTO\BaseDTO;
use App\Core\Traits\MethodTrait;
use JetBrains\PhpStorm\Pure;

/**
 * @method getId(): int
 * @method getName(): string
 * @method getValue(): string
 */
class LegalPropertyDTO extends BaseDTO
{
    use MethodTrait;

    protected int $legalId;

    protected string $name;

    protected string $value;

    #[Pure]
    public static function create(LegalInformationTemplate $template, LegalInformationRelation $companyProperty): self
    {
        $self          = new self();
        $self->legalId = $template->getId();
        $self->name    = $template->getNameProperty();
        $self->value   = $companyProperty->getLegalContent() ?? '';

        return $self;
    }
}