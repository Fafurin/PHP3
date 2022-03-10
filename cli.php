<?php

require_once 'vendor/autoload.php';

use App\Factories\EntityFactory;

try {
    echo EntityFactory::getInstance()->create($argv[1]) . PHP_EOL;
}catch (Exception $e){
    var_dump($e->getMessage());
}