<?php 

namespace Core;

use Core\Http\Request;
use Core\Router\Router;

class App
{
    public function run()
    {
        require_once APP_PATH . '/../routes/routes.php';

        $request = Request::createGlobals();

        $router = new Router;

        dump($router->dispatch($request->getServerValue('request_uri')));
        dump($router->getRoutes()[strtolower($request->getServerValue('request_method'))]);
        dd($request);
    }
}