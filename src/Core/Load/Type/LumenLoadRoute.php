<?php

namespace Raihel\Controller\Core\Load\Type;

use Raihel\Controller\Core\Load\Route;
use \Laravel\Lumen\Routing\Router;

class LumenLoadRoute implements LoadRoute
{
    public function __construct(
        private readonly Router $router
    ) { }


    public function load(Route $route) 
    {
        $controller = explode("\\", $route->getController());

        $this->router->addRoute(
            $route->getHttpMethod()->getMethod()->name, 
            $this->pattern($route), 
            array_pop($controller) . "@{$route->getMethod()}"
        );
    }


    private function pattern(Route $route): string
    {
        $url = '/' . $route->getPattern();
        $path = $route->getHttpMethod()->getPath();
        
        if($path != '' && substr($url, -1) != '/' ) {
            $url = $url . '/' . $path;
        } else {
            $url = $url  . $path;
        }
        return $url;
    }
}