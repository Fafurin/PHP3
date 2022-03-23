<?php

namespace App\Commands\Delete;

interface DeleteCommandHandlerInterface
{
    public function handle(DeleteCommandInterface $command): void;
    public function getSql():string;
}