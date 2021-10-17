<?php
namespace Hyper\Strategy\Router;

use InvalidArgumentException;

class RoutesFile
{
    private Parsers\IRouteParser $parser;
    private $fileContent;

    public function __construct($fileContent, Parsers\IRouteParser $parser)
    {   
        $this->fileContent = $fileContent;
        $this->parser = $parser;
    }

    public function toArray():array
    {
        $decodeData = $this->parser->parse($this->fileContent);
        $routes = array();
        foreach($decodeData as $url => $route)
        {
            if(is_a($route,Route::class))
                $routes[] = $route;
            else if ($this->ArrayCanBeRoute($route))
                $routes[] = $this->MakeRoute($route,$url);
            else
                $routes[] = $this->MakeGroupRoutes($route,$url);
        }

        return $routes;
    }

    public function ArrayCanBeRoute(&$route)
    {
        return key_exists("controller",$route);
    }

    public function MakeRoute($route, $url_base = '/'):Route
    {
        if(!key_exists("verb",$route)) $route["verb"] = "GET";
        return new Route($route["verb"],$url_base,$route["controller"]);
    }

    public function MakeGroupRoutes(array $routes, $url_base = '/'):array
    {
        $group_routes = array();
        foreach($routes as $arrayRoute)
            foreach($arrayRoute as $url => $route)
            {
                $full_url = $url_base . $url;
                $group_routes[] = $this->MakeRoute($route,$full_url);
            }
        return $group_routes;
    }
}

?>