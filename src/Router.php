<?php
namespace Hyper\Strategy;
use Hyper\Strategy\Router\AbstractRouter;
use Hyper\Strategy\Router\Route;
use Hyper\Strategy\Router\RoutesFile;
use Hyper\Strategy\Router\Parsers\RouteJSONParser;

class Router
{
    public $routes;
    public function __construct(RoutesFile $routes)
    {
        $parser = new RouteJSONParser;
        $file = new RoutesFile(__DIR__ . "\\config\\routes.json", $parser);
        $this->routes = $file->toArray();
    }

    public function constructRouter(AbstractRouter $router)
    {
        foreach($this->routes as $route)
        {
            if($route)
            {
                
            }
        }
    }

    public function makeGroup(array $routes, AbstractRouter $router)
    {
        foreach($routes as $route)
        {
            $this->makeRoute($route, $router);
        }
    }

    public function makeRoute(Route $route, AbstractRouter $router, string $urlBase = "/")
    {
        switch($route->verb)
        {
            case "GET":
                $router->get($urlBase . $router->route,$router->controller);
            break;

            case "POST":
                $router->post($urlBase . $router->route,$router->controller);
            break;

            case "PUT":
                $router->put($urlBase . $router->route,$router->controller);
            break;

            case "DELETE":
                $router->delete($urlBase . $router->route,$router->controller);
            break;
        }
    }
}

?>