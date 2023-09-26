<?php
namespace App\Service;

use App\Router\Router;
use App\Service\FileHandler\FileHandlerInterface;


final class Factory {
    
    private $router = null;
    private $presenter = null; 
    
    public function __construct() {
        
    }

    public function getRouter():Router {
        
        if (is_null($this->router)) {
            $this->router = new Router();
        }
        
        return $this->router;
        
    }
    
    public function getPresenter():Presenter {
        
        if (is_null($this->presenter)) {
            $this->presenter = new Presenter();
        }               
        
        return $this->presenter;
        
    }
    
    public function getFileHandler($handler):FileHandlerInterface {
        
        return new $handler;
        
    }

    
}
