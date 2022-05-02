<?php

namespace App\CompanyConnection\DTO;

use App\Companies\Entity\LegalOrganisationType;
use App\Core\DTO\BaseDTO;
use App\Core\Traits\MethodTrait;
use JetBrains\PhpStorm\Pure;

/**
 * @method getId(): int
 * @method getTitle(): string
 */
class LegalOrganisationTypeDTO extends BaseDTO
{
    use MethodTrait;

    protected int $id;

    protected string $title;

    #[Pure]
    public static function create(LegalOrganisationType $legalOrganisationType): self
    {
        $self        = new self();
        $self->id    = $legalOrganisationType->getId();
        $self->title = $legalOrganisationType->getTitle();

        return $self;
    }
}