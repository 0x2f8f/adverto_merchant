<?php

namespace App\CompanyConnection\DTO;

use App\Companies\Entity\Company;
use App\Core\DTO\BaseDTO;
use App\Core\Traits\MethodTrait;
use JetBrains\PhpStorm\Pure;

/**
 * @method getLegalOrganizationType(): ?int
 * @method getLegalProperties(): array
 */
class LegalInfoDTO extends BaseDTO
{
    use MethodTrait;

    protected ?int $legalOrganizationType;

    protected bool $needLicense;

    protected array $legalProperties = [];

    #[Pure]
    public static function create(Company $company): self
    {
        $self                        = new self();
        $self->legalOrganizationType = $company->getLegalOrganisationTypeId();
        $self->needLicense           = (bool)$company->getLicense();

        return $self;
    }

    public function addLegalProperty(LegalPropertyDTO $legalProperty): self
    {
        $this->legalProperties[] = $legalProperty;

        return $this;
    }
}