<?php

namespace Raihel\Controller\Attributes\Route;

use Attribute;
use Raihel\Controller\Enum\HttpMethods;

#[Attribute(Attribute::TARGET_METHOD)]
interface HttpMethod
{
    public function getMethod(): HttpMethods;
    public function getPath(): string;
}