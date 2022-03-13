<?php

namespace App\Factories;

use App\Entities\Article\Article;
use App\Entities\EntityInterface;

class ArticleFactory extends Factory implements ArticleFactoryInterface
{
    private UserFactoryInterface $userFactory;

    public function __construct(
        UserFactoryInterface $userFactory
    ){
        $this->userFactory = $userFactory;
        parent::__construct();
    }

    public function create(): EntityInterface
    {
        return new Article(
            $this->faker->randomDigitNot(0),
            $this->userFactory->create(),
            $this->faker->text(30),
            $this->faker->text()
        );
    }
}