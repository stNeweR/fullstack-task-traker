<?php 

namespace Kernel\Router;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct()
    {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method)
    {
        dump($uri);
        dump($this->routes[$method]);
        foreach($this->routes[$method] as $route) {
            [$controller, $action] = $route->getAction();

            $controller = new $controller();
            call_user_func([$controller, $action]);
        }
    }

    public function initRoutes()
    {
        $routes = require_once APP_PATH . '/../routes/routes.php';

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }
}