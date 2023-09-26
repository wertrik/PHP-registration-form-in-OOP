<?php

namespace App\Validator\Asserts;

use Attribute;
use App\Validator\AssertInterface;

#[Attribute]
class EqualTo implements AssertInterface {    

    private $message;
    private $toCompare;

    public  function __construct($toCompare, $message) {
        $this->message = $message;
        $this->toCompare = $toCompare;
    }
    
    public function isValid($value): bool {
        
        return $value == $this->toCompare;
        
    }
    
}
