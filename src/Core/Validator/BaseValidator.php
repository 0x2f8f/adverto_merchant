<?php

namespace App\Core\Validator;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BaseValidator
{
    public const PRESENTATION_TYPE_CREATE = 'create';
    public const PRESENTATION_TYPE_UPDATE = 'update';
    
    public function __construct(
        protected ValidatorInterface $validator
    ) {}
    
    protected static function getNotBlankObj(string $errorMessage = 'This value should not be blank'): NotBlank
    {
        $notBlankObj          = new NotBlank();
        $notBlankObj->message = $errorMessage;
        
        return $notBlankObj;
    }
    
    protected static function getLengthObj(
        int    $min = null,
        int    $max = null,
        string $minErrorMessage = '',
        string $maxErrorMessage = ''
    ): Length {
        if (empty($maxErrorMessage)) {
            $maxErrorMessage = $minErrorMessage;
        }
        
        $options = [];
        
        if ($min) {
            $options['min'] = $min;
        }
        
        if ($max) {
            $options['max'] = $max;
        }
        
        $lengthObj = new Length($options);
        
        $lengthObj->minMessage = $minErrorMessage;
        $lengthObj->maxMessage = $maxErrorMessage;
        
        return $lengthObj;
    }
}