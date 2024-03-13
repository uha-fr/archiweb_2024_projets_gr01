<?php

require ROUTER.DS.'Route.php';

class Router {

    private $url;
    private $routes = [];

    public function __construct($url){
        $this->url = $url;
    }

    public function get($path, $callable){
        $route = new Route($path, $callable); 
        $this->routes['GET'][] = $route;
    }

    public function post($path, $callable){
        $route = new Route($path, $callable); 
        $this->routes['POST'][] = $route;
    }
    
    public function resolve(){
        $method = $_SERVER['REQUEST_METHOD'];
        foreach($this->routes[$method] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        return 'Page not found';
    }
}