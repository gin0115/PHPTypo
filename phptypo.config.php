<?php

/**
 * @todo REMOVE THIS FILE, FOR DEV ONLY!
 */

use Gin0115\PHPTypo\Config\Config;

return Config::create('TEST')
    ->setMinWord(2)
    ->setDictionary('en_gb')
    ->setSource(__DIR__ . '/tests/files')
    ->setBannedWords('test', 'db');
