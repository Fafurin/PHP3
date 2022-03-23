<?php

namespace App\Commands\Create;

use App\Entities\User\User;

class CreateUserCommand implements CreateCommandInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
