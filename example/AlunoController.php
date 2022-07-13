<?php

namespace App\Aluno;

use Raihel\Controller\Attributes\Controller;
use Raihel\Controller\Attributes\Route\Get;

#[Controller('alunos')]
class AlunoController
{
    #[Get]
    public function get($req, $res)
    {
        return $res->withJson(
            [
                [
                    'id' => 1,
                    'name' => 'Aluno 1',
                ],
                [
                    'id' => 2,
                    'name' => 'Aluno 2',
                ],
            ], 
            200
        );
    }

    #[Get('{id}')]
    public function get2($req, $res, $args)
    {
        return $res->withJson(
            [
                [
                    'id' => $args['id'],
                    'name' => "Aluno ${$args['id']}",
                ],
            ], 
            200
        );
    }
}