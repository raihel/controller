<?php 

namespace Raihel\Controller\Core;

use Raihel\Controller\Attributes\Controller;
use Raihel\Controller\Core\Load\LoadController;
use Jerowork\FileClassReflector\PhpDocumentor\PhpDocumentorClassReflectorFactory;
use Raihel\Controller\Core\Load\Type\LoadRoute as TypeLoadRoute;

class ControllerFactory
{
    public static function load(
        TypeLoadRoute $loadRoute,
        array $diretory = [], 
        array $controllers = [],
    ) {
        $self = new self();

        foreach ($self->getControllersByDiretory(...$diretory) as $controller) {
            $self->loadController($controller, $loadRoute);
        }

        foreach ($controllers as $controller) {
            $self->loadController($controller, $loadRoute);
        }
    }

    private function loadController($controller, TypeLoadRoute $loadRoute)
    {
        $LoadController = new LoadController($controller, $loadRoute);
        $LoadController->load();
    }

    private function getControllersByDiretory(...$diretory): array
    {
        $reflector = PhpDocumentorClassReflectorFactory::createInstance();

        $reflector
            ->addDirectory(...$diretory)
            ->reflect();

        $classes = $reflector->getClasses();

        $controllers = [];

        foreach ($classes as $classe) {
            if ($classe->getAttributes(Controller::class)) {
                $controllers[] = $classe;
            }
        }
        return $controllers;
    }
}