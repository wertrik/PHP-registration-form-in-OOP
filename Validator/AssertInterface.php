<?php

namespace App\Validator;

interface AssertInterface {

    public function isValid($value):bool;
    
}
