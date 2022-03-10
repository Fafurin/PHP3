<?php

namespace App\Factories;

use App\Entities\EntityInterface;
use \Faker\Factory as FakerFactory;
use Faker\Generator;

abstract class Factory
{
    protected ?Generator $faker = null;

    public function __construct(?FakerFactory $faker= null){
        $this->faker = $faker ?? FakerFactory::create();
    }

    abstract public function create(): EntityInterface;
}