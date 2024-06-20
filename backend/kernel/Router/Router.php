<?php 

namespace Kernel\Router;

class Router
{  
    private static ?Router $instance = null;

    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];
    
    public static function getInstance(): Router
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function dispatch(string $uri, string $method)
    {
        require_once '../routes/routes.php';
        foreach($this->routes[$method] as $routeConfiguration) {
            if ($routeConfiguration->getRoute() === $uri) {   
                $controller = $routeConfiguration->getController();
                $action = $routeConfiguration->getAction();
                $controller = new $controller();
                call_user_func([$controller, $action]);
            } 
        }
        $this->notFoundRoute();
    }

    public function initRoute(string $method, RouteConfiguration $route)
    {
        $this->routes[$method][] = $route;
    }

    public function notFoundRoute()
    {
        http_response_code(404);
        echo "404!";
        die();
    }
}