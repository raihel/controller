<?php

namespace Raihel\Controller\Core\Load\Type;

use Raihel\Controller\Core\Load\Route;
use \Laravel\Lumen\Routing\Router;

class LaravelLoadRoute implements LoadRoute
{
    public function __construct(
        private readonly Router $route
    ) { }


    public function load(Route $route) 
    {
        $this->route->addRoute(
            $route->getHttpMethod()->getMethod()->name, 
            $this->pattern($route), 
            $route->getController() . "@{$route->getMethod()}"
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