<?php

namespace App\Commands\Delete;

use App\Connections\ConnectorInterface;
use App\Connections\SqLiteConnector;

abstract class DeleteCommandHandler implements DeleteCommandHandlerInterface
{
    protected \PDOStatement|false $stmt;

    public function __construct(protected ?ConnectorInterface $connector = null)
    {
        $this->connector = $connector ?? new SqLiteConnector();
        $this->stmt = $this->connector->getConnection()->prepare($this->getSql());
    }
}