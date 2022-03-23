<?php

namespace App\Commands\Create;

interface CreateCommandHandlerInterface
{
    public function handle(CreateCommandInterface $command): void;
    public function getSql():string;
}