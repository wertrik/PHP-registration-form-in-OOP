<?php

namespace App\Service\FileHandler;


interface FileHandlerInterface {

    const DIR = '';
    const NEWLINE = '\r\n';
    
    public function writeNewRecord(array $data);
    
    
    
    
}
