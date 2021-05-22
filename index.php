#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Gin0115\PHPTypo\App;
use Gin0115\PHPTypo\SpellCheck;
use Silly\Edition\PhpDi\Application;


$app = new App();

$app->command( 'spell [--src=] [--dict=] [--min-word=]', SpellCheck::class )
	->defaults([
    'src' => 'src',
    'dict'  => 'en_gb',
    'min-word' => 2,
	]);

$app->setDefaultCommand( 'spell' );

$app->run();
