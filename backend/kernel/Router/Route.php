<?php 

namespace Kernel\Router;

use Kernel\Router\RouteConfiguration;
use Kernel\Router\Router;

class Route
{
    public string $action;
    public static string $uri;
    
    public static function get(string $uri, array $action): RouteConfiguration
    {
        $routeConfiguration = new RouteConfiguration($uri, $action[0], $action[1]);
        Router::getInstance()->initRoute('GET', $routeConfiguration);
        return $routeConfiguration;
    }

    public static function post(string $uri, array $action): RouteConfiguration
    {
        $routeConfiguration = new RouteConfiguration($uri, $action[0], $action[1]);
        return $routeConfiguration;
    }
}