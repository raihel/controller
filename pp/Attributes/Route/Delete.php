<?php

namespace Raihel\Controller\Attributes\Route;

use Attribute;
use Raihel\Controller\Enum\HttpMethods;

#[Attribute(Attribute::TARGET_METHOD)]
class Delete implements HttpMethod
{
    public function __construct(
        public readonly string $path = '',
    ) {}

    public function getMethod(): HttpMethods
    {
        return HttpMethods::DELETE;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}