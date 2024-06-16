<?php 

namespace Kernel;

use Kernel\Http\Request;
use Kernel\Router\Router;

class App
{
    public function run()
    {
        $request = Request::createGlobals();

        $router = new Router;

        $router->dispatch(
            $request->getServerValue('request_uri'), 
            $request->getServerValue('request_method'),
        );
    }
}