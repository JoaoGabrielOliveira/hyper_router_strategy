<?php
namespace Hyper\Strategy;
use Hyper\Strategy\Router\IRouter;
use Hyper\Strategy\Router\Route;
use Hyper\Strategy\Router\RoutesFile;
use Hyper\Strategy\Router\Parsers\IRouteParser;

class Router
{
    public array $routes;
    private IRouter $router;

    public function __construct(IRouteParser $parser, IRouter $router)
    {
        $file = new RoutesFile(__DIR__ . "\\config\\routes.json", $parser);
        $this->routes = $file->toArray();
        $this->router = $router;
    }

    public function start():void{
        $this->router->start();
    }

    public function makeGroup(array $routes):void
    {
        foreach($routes as $route)
        {
            $this->makeRoute($route);
        }
    }

    public function makeRoute(Route $route, string $urlBase = "/"):void
    {
        switch($route->verb)
        {
            case "GET":
                $this->router->get($urlBase . $route->path, $route->controller);
            break;

            case "POST":
                $this->router->post($urlBase . $route->path, $route->controller);
            break;

            case "PUT":
                $this->router->put($urlBase . $route->path, $route->controller);
            break;

            case "DELETE":
                $this->router->delete($urlBase . $route->path, $route->controller);
            break;
        }
    }
}

?>