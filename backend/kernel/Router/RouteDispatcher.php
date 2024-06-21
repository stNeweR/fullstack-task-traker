<?php 

namespace Kernel\Router;

use Kernel\Helpers\Str;
use Kernel\Router\RouteConfiguration;

class RouteDispatcher
{
    private $paramMap = [];
    private $requestUri = '/';
    private $requestUriArray = [];
    private $routeUri = '/';
    private $routeParams = [];
    private $route;
    private $requestParamMap = [];

    public function process(RouteConfiguration $routeConfiguration, string $uri)
    {
        $this->requestUri = Str::clean($uri);
        $this->route = $routeConfiguration;
        $this->routeUri = Str::clean($routeConfiguration->getRoute());

        $this->setRouteParam();

        $this->makeRegexRequest();

        if ( preg_match("/$this->requestUri/", $this->routeUri)) {
            $this->render();
        }
    }

    public function setRouteParam()
    {        
        $this->routeParams = explode('/', $this->routeUri);

        foreach ($this->routeParams as $key => $param) {
            if (preg_match('/{.*}/', $param)) {
                $this->paramMap[$key] = preg_replace('/(^{)|(}$)/', '', $param);
            }
        }
    }

    public function makeRegexRequest()
    {
        $this->requestUriArray = explode('/', $this->requestUri);

        foreach ($this->paramMap as $key => $param) {
            if (!isset($this->requestUriArray[$key])) {
                return;
            }

            $this->requestParamMap[$param] = $this->requestUriArray[$key];
            $this->requestUriArray[$key] = '{.*}';            
        }

        $this->requestUri = implode('/', $this->requestUriArray);
        $this->prepareRegex();
    }

    public function prepareRegex()
    {
        $this->requestUri = str_replace('/', '\/', $this->requestUri);
    }

    public function render()
    {
        $ClassName = $this->route->getController();
        $action = $this->route->getAction();

        print_r((new $ClassName)->$action(...$this->requestParamMap));
        die();
    }
}