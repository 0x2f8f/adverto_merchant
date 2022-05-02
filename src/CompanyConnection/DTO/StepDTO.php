<?php

namespace App\CompanyConnection\DTO;

use App\Core\DTO\BaseDTO;
use App\Core\Traits\MethodTrait;

/**
 * @method getAvailable(): bool
 * @method setAvailable(bool $val): self
 * @method getIsFilled(): bool
 * @method setIsFilled(bool $val): self
 */
class StepDTO extends BaseDTO
{
    use MethodTrait;
    
    protected bool $available = false;
    
    protected bool $isFilled = false;
}