<?php
namespace Hyper\Strategy\Router;
class Route
{
    public $verb;
    public $path;
    public $controller;

    public function __construct($verb, $path, $controller)
    {
        $this->verb = $verb;
        $this->path = $path;
        $this->controller = $controller;
    }
}

?>