<?php

namespace App\Controller;

use App\Service\Factory;
use App\Controller\UserController;
use App\Service\FileHandler\PlainTextFileHandler;

class MainController {
    
    private Factory $factory;

    public function __construct(Factory $factory) {

        $this->factory = $factory;
        
    }
    
    public function createByRoute(array $route) {
        
        $controller_route = $route[0];
        
        switch($controller_route):
            
            case 'registrace':
                $controller = new UserController();
                $controller->registration($this->factory->getPresenter(), $this->factory->getFileHandler(PlainTextFileHandler::class));
            break;
            case 'registrace-uspesna':
                $controller = new UserController();
                $controller->registrationSuccessful($this->factory->getPresenter());
            break;
        default :

            $this->factory->getPresenter()->render();
            
        endswitch;        
        
        
    }
    
    
    
}
