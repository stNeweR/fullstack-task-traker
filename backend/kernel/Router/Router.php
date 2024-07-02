<?php 

namespace Kernel\Router;

use Exception;
use Kernel\Http\Request;
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
        $dispatcher = new RouteDispatcher();
        $routeFound = false;

        if (isset($_SERVER['HTTP_METHOD'])) {
            foreach ($this->routes[strtoupper($_SERVER['HTTP_METHOD'])] as $routeConfiguration) {
                dump($_SERVER['HTTP_METHOD']);
                if ($dispatcher->process($routeConfiguration, $uri)) {
                    $routeFound = true;
                    break;
                }
            }
            if (!$routeFound) {
                $this->notFoundRoute($uri);
                throw new Exception('Неверный метод: ' . $_SERVER['HTTP_METHOD']);
            }
        }

        foreach($this->routes[$method] as $routeConfiguration) {
            dump($routeConfiguration);
            if ($dispatcher->process($routeConfiguration, $uri)) {
                $routeFound = true;
                break;
            }
        }

        if (!$routeFound) {
            $this->notFoundRoute($uri);
            // throw new Exception('Маршрут не найден: ' . $uri);
        }
    }

    public function initRoute(string $method, RouteConfiguration $route)
    {
        $this->routes[$method][] = $route;
    }

    public function notFoundRoute($route)
    {
        // http_response_code(404);
        throw new Exception('Роут не найден ' . $route);
    }
}