<?php

namespace App\Core\Traits;

use Doctrine\Common\Util\ClassUtils;
use Exception;
use RuntimeException;

trait MethodTrait
{
    /**
     * PHP magic caller
     *
     * @param string $name
     * @param array  $args
     *
     * @return mixed
     * @throws Exception
     */
    public function __call(string $name, array $args)
    {
        return $this->call($name, $args);
    }
    
    /**
     * PHP magic getter
     *
     * @param string $name
     *
     * @return mixed
     * @throws RuntimeException
     */
    public function __get(string $name)
    {
        try {
            return $this->{'get' . $name}();
        } catch (RuntimeException $e) {
            $this->createPropertyException($name, $e);
        }
    }
    
    /**
     * PHP magic setter
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return mixed
     * @throws RuntimeException
     */
    public function __set(string $name, $value)
    {
        try {
            return $this->{'set' . $name}($value);
        } catch (RuntimeException $e) {
            $this->createPropertyException($name, $e);
        }
    }
    
    /**
     * Can't use type hint 'string' because of doctrine use same method for proxy w/o type hint
     *
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        try {
            $this->{'get' . $name}();
        } catch (RuntimeException $e) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Read only properties
     *
     * @return string[]
     */
    protected static function readOnlyProperties(): array
    {
        return [];
    }
    
    /**
     * List of Iterable properties
     *
     * @return string[]
     */
    protected static function listProperties(): array
    {
        return [];
    }
    
    /**
     * @param string $name method name
     * @param array  $args
     *
     * @return mixed
     * @throws RuntimeException
     */
    protected function call(string $name, array $args)
    {
        if (preg_match('#^(get|set|is|has|need|can)(\w+)$#i', $name, $method)) {
            list(, $method, $property) = $method;
            $value = $args ? reset($args) : null;
            
            if (!strcasecmp($method, 'is')) {
                return $this->{'getIs' . $property}();
            }
            
            if (preg_match('#^(has|need|can)$#i', $method)) {
                $property = $method . $property;
                
                return $value === null ? $this->{'get' . $property}() : $this->{'set' . $property}($value);
            }
            
            if (property_exists($this, $property = lcfirst($property))) {
                if (!strcasecmp($method, 'get')) {
                    return in_array($property, static::listProperties()) ? (array) $this->$property : $this->$property;
                }
                
                if (!in_array($property, static::readOnlyProperties())) {
                    if (!$args) {
                        throw new RuntimeException(
                            sprintf('Value argument for method %s::%s is not set', ClassUtils::getClass($this), $name)
                        );
                    }
                    
                    switch (true) {
                        case preg_match('#^(is|has|need|can)[A-Z_]#', $property):
                            $value = (bool) $value;
                            break;
                        
                        case in_array($property, static::listProperties()) && !is_array($value):
                            $value = explode(',', $value);
                            break;
                    }
                    
                    $this->$property = $value;
                    
                    return $this;
                }
            }
        }
        
        throw new RuntimeException(sprintf('Unknown method %s::%s', ClassUtils::getClass($this), $name));
    }
    
    private function createPropertyException(string $name, RuntimeException $e): void
    {
        throw new RuntimeException(
            sprintf('Unknown property %s::%s', ClassUtils::getClass($this), $name),
            $e->getCode(),
            $e->getPrevious()
        );
    }
}