<?php 

namespace Core\Router;

class Router
{
    public static array $routes = [
        'get' => [],
        'post' => [],
    ];

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function get(string $uri, array $method)
    {
        self::$routes['get'][] = [
            'uri' => $uri,
            'method' => $method            
        ];
    }

    public static function post(string $uri, array $method)
    {
        self::$routes['post'][] = [
            'uri' => $uri,
            'method' => $method
        ];
    }

    public function dispatch(string $uri)
    {
        return $uri;
    }
}