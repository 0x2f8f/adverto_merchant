<?php

namespace App\Core\DTO;

abstract class BaseDTO
{
    public function toArray(): array
    {
        return $this->doToArray(get_object_vars($this));
    }
    
    private function doToArray(array $objVars): array
    {
        $result = [];
        
        foreach ($objVars as $objVarKey => $objVarValue) {
            $key = strtolower(preg_replace('~(?<=\\w)([A-Z])~', '_$1', $objVarKey));
            if ($objVarValue instanceof self) {
                $result[$key] = $objVarValue->toArray();
            } elseif (\is_array($objVarValue)) {
                $result[$key] = $this->doToArray($objVarValue);
            } elseif ($objVarValue !== null) {
                $result[$key] = $objVarValue;
            }
        }
        
        return $result;
    }
}