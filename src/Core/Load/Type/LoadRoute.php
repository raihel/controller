<?php

namespace Raihel\Controller\Core\Load\Type;

use Raihel\Controller\Core\Load\Route;

interface LoadRoute
{
    public function load(Route $route);
}