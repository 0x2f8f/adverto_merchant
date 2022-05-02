<?php

namespace App\CompanyConnection\DTO;

use App\Companies\Entity\Company;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class CompanyModifyResultDTO
{
    private ?Company $company;
    
    private ?ConstraintViolationListInterface $violations;
    
    private function __construct(?Company $company, ?ConstraintViolationListInterface $violations)
    {
        $this->company    = $company;
        $this->violations = $violations;
    }
    
    public function getCompany(): ?Company
    {
        return $this->company;
    }
    
    #[Pure]
    public static function createSuccess(Company $company): self
    {
        return new self($company, null);
    }
    
    #[Pure]
    public static function createFail(ConstraintViolationListInterface $violations): self
    {
        return new self(null, $violations);
    }
    
    public function getFirstViolation(): ?string
    {
        if ($this->violations || $this->violations->count() > 0) {
            // возвращается только первое сообщение чтобы не ломать логику тестов и клиента
            // (это сообщение показывается пользователю)
            $violation  = $this->violations->get(0);
            $parameters = $violation->getParameters();
            
            return sprintf('%s Field - %s', $violation->getMessage(), current($parameters));
        }
        
        return null;
    }
}