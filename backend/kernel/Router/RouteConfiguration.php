<?php

namespace Kernel\Router;

class RouteConfiguration
{
    public string $route;
    public string $controller;
    public string $action;
    public string $name;
    public string $middleware;

    public function __construct(string $route, string $controller, string $action)
    {
        $this->route = '/api' . $route;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function name(string $name): RouteConfiguration
    {
        $this->name = $name;
        return $this;
    }

    public function middleware(string $middleware): RouteConfiguration
    {
        $this->middleware = $middleware;
        return $this;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}