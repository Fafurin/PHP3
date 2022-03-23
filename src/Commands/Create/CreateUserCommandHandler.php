<?php

namespace App\Commands\Create;

class CreateUserCommandHandler extends CreateCommandHandler
{
    /**
     * @var CreateUserCommand $command
     */
    public function handle(CreateCommandInterface $command): void
    {
        $user = $command->getUser();

        $this->stmt->execute([
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail()
        ]);
    }

    public function getSql():string
    {
        return
            "
                INSERT INTO users (first_name, last_name, email) 
                VALUES (:firstName, :lastName, :email)
             ";
    }
}