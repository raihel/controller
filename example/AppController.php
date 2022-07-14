<?php

namespace App;

use Raihel\Controller\Attributes\Controller;
use Raihel\Controller\Attributes\Route\Get;
use Raihel\Controller\Attributes\Route\Put;

#[Controller]
class AppController
{
    #[Get]
    public function get()
    {
        echo 'Hello World!';
    }

    #[Get('hello'), Put('hello')]
    public function get2()
    {
        echo 'Hello World 2!';
    }
}