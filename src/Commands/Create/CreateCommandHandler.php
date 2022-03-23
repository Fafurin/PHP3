<?php

namespace App\Commands\Create;

use App\Connections\ConnectorInterface;
use App\Connections\SqLiteConnector;

abstract class CreateCommandHandler implements CreateCommandHandlerInterface
{
    protected \PDOStatement|false $stmt;

    public function __construct(protected ?ConnectorInterface $connector = null)
    {
        $this->connector = $connector ?? new SqLiteConnector();
        $this->stmt = $this->connector->getConnection()->prepare($this->getSql());
    }
}