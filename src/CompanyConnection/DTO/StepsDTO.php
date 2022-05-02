<?php

namespace App\CompanyConnection\DTO;

use App\Core\DTO\BaseDTO;
use App\Core\Traits\MethodTrait;

/**
 * @method getGeneral(): StepDTO
 * @method getLegalData(): StepDTO
 * @method getAdverts(): StepDTO
 * @method getDelivery(): StepDTO
 */
class StepsDTO extends BaseDTO
{
    use MethodTrait;
    
    protected StepDTO $general;
    
    protected StepDTO $legalData;
    
    protected StepDTO $adverts;
    
    protected StepDTO $delivery;
    
    public function __construct()
    {
        $this->general   = new StepDTO();
        $this->legalData = new StepDTO();
        $this->adverts   = new StepDTO();
        $this->delivery  = new StepDTO();
    }
}