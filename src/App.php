<?php

namespace Gin0115\PHPTypo;

use DI\Container;
use DI\ContainerBuilder;
use Silly\Edition\PhpDi\Application;

class App extends Application {

    /**
     * Creates custom instance of container with bindings.
     *
     * @return \DI\Container
     */
    protected function createContainer(): Container
    {
        $container = ( new ContainerBuilder() )
            ->addDefinitions(
                [
                ]
            )
            ->build();
            return $container;
    }

}