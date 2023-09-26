<?php

namespace App\Validator\Asserts;

use App\Validator\AssertInterface;
use Attribute;

#[Attribute]
class NotEmpty implements AssertInterface {
    
    private $message;
    

    public  function __construct($message) {
        $this->message = $message;
    }

    public function isValid($value): bool {

        return !empty($value);
        
    }
    
    
    
    
}
