<?php
namespace Hyper\Strategy\Router;
interface IRouter
{
    public function start():void;

    public function get(string $route, $controller):void;
    public function post(string $route, $controller):void;
    public function put(string $route, $controller):void;
    public function delete(string $route, $controller):void;

    public function error($controller = "");

    public function base(string $route, $controller):void;

    public function namespace(string $name);
    public function group(string $name);
}

?>