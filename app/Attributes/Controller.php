<?php

namespace Raihel\Controller\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Controller
{
    public function __construct(
        private readonly string $prefix = '',
    ) {}


    public function getPrefix()
    {
        return $this->prefix;
    }
}