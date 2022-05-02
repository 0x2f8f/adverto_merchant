<?php

namespace App\CompanyConnection\Validator;

use App\CompanyConnection\DTO\CompanyDTO;
use App\Core\Validator\BaseValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class CompanyValidator extends BaseValidator
{
    private const ERROR_MESSAGE_INVALID_TITLE_FORMAT = 'Invalid name format';
    
    public function validateCompanyInfo(CompanyDTO $companyDTO, string $action): ConstraintViolationListInterface
    {
        return $this->validator->validate(
            $companyDTO->toArray(),
            $this->getConstrains(),
            [Constraint::DEFAULT_GROUP, $action]
        );
    }
    
    private function getConstrains(bool $optional = false): Collection
    {
        //TODO: add more constraints - MER-11
        $constrains = [
            'fields' => [
                'title' => self::getConstraintsTitle(),
            
            ],
        ];
        
        $constrainCollection = new Collection($constrains);
        $constrainCollection->allowExtraFields = true;
        
        if ($optional) {
            //this is used for update operation
            $constrainCollection->allowMissingFields = true;
        }
        
        return $constrainCollection;
    }
    
    private static function getConstraintsTitle(): array
    {
        return [
            self::getNotBlankObj(self::ERROR_MESSAGE_INVALID_TITLE_FORMAT),
            new Type(['type' => 'string', 'message' => self::ERROR_MESSAGE_INVALID_TITLE_FORMAT]),
            self::getLengthObj(2, 100, self::ERROR_MESSAGE_INVALID_TITLE_FORMAT),
        ];
    }
}