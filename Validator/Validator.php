<?php

namespace App\Validator;

use ReflectionClass;
use ReflectionAttribute;

class Validator {
    
    private $violations = [];
    
    public function validate(object $user):void {

        $reflector = new ReflectionClass($user);
        
        $properties = $reflector->getProperties();
        $methods = $reflector->getMethods();
        
        $classParts = array_merge($properties, $methods);
        $this->checkAsserts($classParts, $user);
        
    }

    private function checkAsserts(array $classParts, object $user):void {

        foreach ($classParts as $classPart) {
                       
            $attributes = $classPart->getAttributes(
                AssertInterface::class,
                ReflectionAttribute::IS_INSTANCEOF        
            );            
            
            foreach ($attributes AS $attribute) {
            
                $validator = $attribute->newInstance();
                
                if ($classPart instanceof \ReflectionMethod) {
                        
                    if (false == $validator->isValid($user->{$classPart->getName()}())) {
                        $this->violations[$user::class]['messages'][] = $attribute->getArguments()['message'];
                    }
                        
                } else if ($classPart instanceof \ReflectionProperty) {
                        
                    if (false == $validator->isValid($classPart->getValue($user))) {
                        $this->violations[$user::class]['messages'][] = $attribute->getArguments()['message'];

                    }
                        
                }

                
            }
            
            
        }
        
    }
    
    public function getViolationsList():array {
        return $this->violations;
    }
    
    
}
