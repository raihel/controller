<?php

namespace Raihel\Controller\Core\Load;

use Raihel\Controller\Attributes\Controller;
use Raihel\Controller\Attributes\Route\{ Delete, Get, Post, Put };
use Raihel\Controller\Core\Load\Type\LoadRoute;
use ReflectionClass;

class LoadController
{
    public function __construct(
        private readonly string | ReflectionClass $controllerClassName,
        private readonly LoadRoute $loadRoute,
    ) { }


    public function getReflectionClass()
    {
        if (is_string($this->controllerClassName)) {
            return new ReflectionClass($this->controllerClassName);
        }
        return $this->controllerClassName;
    }

    public function load()
    {   

        $reflectionClass = $this->getReflectionClass();

        if (!$reflectionClass->getAttributes(Controller::class)) {
            return;
        }
        
        $attribute = $reflectionClass->getAttributes(Controller::class)[0];
        $controllerAttribute = $attribute->newInstance();

        $attributesMethod = $reflectionClass->getMethods();

        foreach($attributesMethod as $method) {

            $this->httpMethod(
                method: $method,
                controllerPattern: $controllerAttribute,
                controllerClass: $reflectionClass->getName(),
            );
        }   
    }

    private function httpMethod($method, $controllerPattern, $controllerClass)
    {

        if ($method->getAttributes(Post::class)) {
            $this->loadRoute->load(RouteFactory::create(
                    controllerAttribute: $controllerPattern,
                    controller: $controllerClass,
                    method: $method,
                    hTTPMethod: $method->getAttributes(Post::class)[0]->newInstance(),
                )
            );
        }

        if ($method->getAttributes(Get::class)) {
            $this->loadRoute->load(RouteFactory::create(
                controllerAttribute: $controllerPattern,
                controller: $controllerClass,
                method: $method,
                hTTPMethod: $method->getAttributes(Get::class)[0]->newInstance(),
            )
        );
        }

        if ($method->getAttributes(Put::class)) {
            $this->loadRoute->load(RouteFactory::create(
                controllerAttribute: $controllerPattern,
                controller: $controllerClass,
                method: $method,
                hTTPMethod: $method->getAttributes(Put::class)[0]->newInstance(),
            )
        );
        }

        if ($method->getAttributes(Delete::class)) {
            $this->loadRoute->load(RouteFactory::create(
                controllerAttribute: $controllerPattern,
                controller: $controllerClass,
                method: $method,
                hTTPMethod: $method->getAttributes(Delete::class)[0]->newInstance(),
            )
        );
        }
    }
}