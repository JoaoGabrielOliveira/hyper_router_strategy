<?php
namespace Hyper\Strategy\Router\Parsers;
use Hyper\Strategy\Router\Route;
use Hyper\Strategy\Router\Parsers\IRouteParser;

class RouteArrayParser implements IRouteParser
{
    public function parse($data)
    {
        $routes = [];
        foreach($data as $route => $dataRoute)
        {
            if(is_string($route))
            {
                foreach($dataRoute as $itemGroupRoute)
                {
                    $itemGroupRoute->path = $route . $itemGroupRoute->path;
                    $routes[] = $itemGroupRoute;
                }
            }
            else
                $routes[] = $dataRoute;
        }
        return $routes;
    }
}

?>