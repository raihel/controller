<?php

namespace Raihel\Controller\Core\Load;

use Raihel\Controller\Attributes\Controller;
use Raihel\Controller\Attributes\Route\HttpMethod;
use ReflectionMethod;

class RouteFactory
{
    public static function create(
        Controller $controllerAttribute,
        string $controller,
        ReflectionMethod $method,
        HttpMethod $hTTPMethod,
        array $middlewares = [],
    ): Route
    {
        return new Route(
            pattern: $controllerAttribute->getPrefix(),
            httpMethod: $hTTPMethod,
            controller: $controller,
            method: $method->getName(),
            middlewares: $middlewares,
        );
    }
}