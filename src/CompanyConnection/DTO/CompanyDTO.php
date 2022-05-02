<?php

namespace App\CompanyConnection\DTO;

use App\Companies\Entity\Company;
use App\Core\DTO\BaseDTO;
use App\Core\Traits\MethodTrait;
use App\Users\Entity\User;
use JetBrains\PhpStorm\Pure;

/**
 * @method getCountryId(): ?int
 * @method getCityId(): ?int
 * @method getTitle(): ?string
 * @method getSite(): ?string
 * @method getPhones(): ?array
 * @method getManagerName(): ?int
 * @method getManagerSurname(): ?int
 * @method getManagerPhone(): ?string
 * @method getManagerEmail(): ?string
 */
class CompanyDTO extends BaseDTO
{
    use MethodTrait;

    protected int $companyId;

    protected User $user;

    protected string $title;

    protected int $countryId;

    protected int $cityId;

    protected string $site;

    protected array $phones;

    protected string $managerName;

    protected string $managerSurname;

    protected string $managerPhone;

    protected string $managerEmail;

    #[Pure]
    public static function createFromClientRequestParameters(array $parameters): self
    {
        $dto                 = new self();
        $dto->title          = $parameters['title'];
        $dto->countryId      = $parameters['country_id'];
        $dto->cityId         = $parameters['city_id'];
        $dto->site           = $parameters['site'];
        $dto->phones         = is_array($parameters['phones'])
            ? $parameters['phones']
            : array_map('trim', explode(',', $parameters['phones']));
        $dto->managerName    = $parameters['manager_name'];
        $dto->managerSurname = $parameters['manager_surname'];
        $dto->managerPhone   = $parameters['manager_phone'];
        $dto->managerEmail   = $parameters['manager_email'];
        $dto->user           = $parameters['user'];

        if (isset($parameters['company_id'])) {
            $dto->companyId = $parameters['company_id'];
        }

        return $dto;
    }

    #[Pure]
    public static function create(Company $company = null): self
    {
        $self = new self();
        if (!$company) {
            return $self;
        }

        $self->companyId      = $company->getId();
        $self->user           = $company->getUser();
        $self->countryId      = $company->getCountryId();
        $self->cityId         = $company->getCityId();
        $self->title          = $company->getTitle() ?: '';
        $self->site           = $company->getSite() ?: '';
        $self->phones         = $company->getPhones() ? json_decode($company->getPhones()) : [];
        $self->managerName    = $company->getManagerName() ?: '';
        $self->managerSurname = $company->getManagerSurname() ?: '';
        $self->managerPhone   = $company->getManagerPhone() ?: '';
        $self->managerEmail   = $company->getManagerEmail() ?: '';

        return $self;
    }

    public function toArray(): array
    {
        $result = parent::toArray();
        unset($result['user']);

        return $result;
    }
}