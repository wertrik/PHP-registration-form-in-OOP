<?php

namespace App\Service;


class Presenter {
    
    private const TEMPLATE_DIR = 'Template';
    private const BASE_TEMPLATE = 'BaseTemplate';


    public function render(null|string $template = null, array $data = null) {
        
        $template = $template ?? self::BASE_TEMPLATE;
        
        $file = self::TEMPLATE_DIR.'/'.$template.'.php';

        if (file_exists($file)) {
            include_once $file;
        } else {
            throw new \Exception('Template not found!');
        }        
        
    }
    
    
}
