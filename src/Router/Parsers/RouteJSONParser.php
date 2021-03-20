<?php
namespace Hyper\Strategy\Router\Parsers;
use Hyper\Strategy\Router\Parsers\IRouteParser;

class RouteJSONParser implements IRouteParser
{
    public function do($data)
    {
        $json_array = json_decode($data, true);
        return $json_array;
    }
}
?>