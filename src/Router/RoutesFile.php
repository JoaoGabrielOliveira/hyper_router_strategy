<?php
namespace Hyper\Strategy\Router;

use InvalidArgumentException;

class RoutesFile
{
    private Parsers\IRouteParser $parser;
    private $content;

    public function __construct(string $path, Parsers\IRouteParser $parser)
    {
        if (!file_exists($path))
            throw new InvalidArgumentException("File do not exist!");
        $this->content = file_get_contents($path);
        $this->parser = $parser;
    }

    public function toArray()
    {
        $decodeData = $this->parser->do($this->content);

        foreach($decodeData as $url => $route)
        {
            if (!$this->arrayCanBeRoute($route))
                $routes[] = $this->MakeGroupRoutes($route,$url);
            else
                $routes[] = $this->MakeRoute($route,$url);
        }

        return $routes;
    }

    public function ArrayCanBeRoute(&$route)
    {
        return key_exists("controller",$route);
    }

    public function MakeRoute($route, $url_base = '/')
    {
        if(!key_exists("verb",$route)) $route["verb"] = "GET";
        return new Route($route["verb"],$url_base,$route["controller"]);
    }

    public function MakeGroupRoutes(array $routes, $url_base = '/')
    {
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