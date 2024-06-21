<?php 

namespace Kernel\Router;

use Kernel\Router\RouteDispatcher;
use Kernel\Router\RouteConfiguration;
use Kernel\Helpers\Str;

class Router
{  
    private static ?Router $instance = null;

    private array $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => []
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
        // dump($this->routes);
        $dispatcher = new RouteDispatcher();
        foreach($this->routes[$method] as $routeConfiguration) {
            // $routeConfiguration->route =  Str::clean($routeConfiguration->getRoute());
            $dispatcher->process($routeConfiguration, $uri);

            // if ($routeConfiguration->getRoute() === $uri) {   
            //     $controller = $routeConfiguration->getController();
            //     $action = $routeConfiguration->getAction();
            //     $controller = new $controller();
            //     call_user_func([$controller, $action]);
            // } 
        }
        // dd(9);
        // $this->notFoundRoute();
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