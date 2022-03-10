<?php

namespace App\Factories;

use App\Entities\User\User;
use App\Entities\EntityInterface;

class UserFactory extends Factory implements UserFactoryInterface
{
    public function create(): EntityInterface
    {
        return new User(
            $this->faker->randomDigitNot(0),
            $this->faker->firstName(),
            $this->faker->lastName()
        );
    }
}