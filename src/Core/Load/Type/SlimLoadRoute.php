<?php

namespace Raihel\Controller\Core\Load\Type;

use Raihel\Controller\Core\Load\Route;
use Slim\App;

class SlimLoadRoute implements LoadRoute
{
    public function __construct(
        private readonly  App $app
    ) { }


    public function load(Route $route) 
    {
        $this->app->map(
            [ $route->getHttpMethod()->getMethod()->name ], 
            $this->pattern($route),
            $route->getController() . ":{$route->getMethod()}"
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