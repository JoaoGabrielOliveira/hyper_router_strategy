<?php
namespace Hyper\Strategy;
use Hyper\Strategy\Router\AbstractRouter;
use Hyper\Strategy\Router\Route;

class Router
{
    public function __construct($path)
    {
        
    }

    public function construct_router(array $routes, AbstractRouter $router)
    {
        foreach($routes as $route)
        {
            $this->make_route($route, $router);
        }
    }

    public function make_route(Route $route, AbstractRouter $router)
    {
        
        switch($route->verb)
        {
            case "GET":
                $router->get($router->route,$router->controller);
            break;

            case "POST":
                $router->post($router->route,$router->controller);
            break;

            case "PUT":
                $router->put($router->route,$router->controller);
            break;

            case "DELETE":
                $router->delete($router->route,$router->controller);
            break;
        }
    }
}

?>