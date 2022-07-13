<?php

namespace Raihel\Controller\Core\Load;

use Raihel\Controller\Attributes\Route\HttpMethod;

class Route
{
    public function __construct(
        private readonly string $pattern,
        private readonly HttpMethod $httpMethod,
        private readonly string $controller,
        private readonly string $method,
        private readonly array $middlewares = []
    ) { }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function getHttpMethod(): HttpMethod
    {
        return $this->httpMethod;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}