<?php

namespace App\Factories;

use App\Connections\ConnectorInterface;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;
use App\Repositories\EntityRepository;
use App\Repositories\UserRepository;

class RepositoryFactory implements RepositoryFactoryInterface
{
    private ConnectorInterface $connector;

    public function __construct(ConnectorInterface $connector)
    {
        $this->connector = $connector;
    }

    public function create(string $type):EntityRepository{
        return match($type)
        {
            'user' => new UserRepository($this->connector),
            'article' => new ArticleRepository($this->connector),
            'comment' => new CommentRepository($this->connector),
        };
    }

}