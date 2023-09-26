<?php

namespace App\Validator\Asserts;

use Attribute;
use App\Validator\AssertInterface;

#[Attribute]
class IsTrue implements AssertInterface {

    private $message;
    

    public  function __construct($message) {
        $this->message = $message;
    }
    
    public function isValid($value): bool {
        
        return (bool) $value;
        
    }
    
    
}
