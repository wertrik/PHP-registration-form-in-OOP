<?php

namespace App\Router;


class Router {
    
    public function parseRouteToArray(string $route) {
        
        $route = substr(parse_url($route, PHP_URL_PATH),1);
        
        return explode("/", $route);
        
    }

}
