<?php

namespace App\Repositories;

use App\Entities\EntityInterface;
use App\Entities\User\User;
use App\Exceptions\UserNotFoundException;
use PDO;

class UserRepository extends EntityRepository implements UserRepositoryInterface
{

    public function get(int $id): EntityInterface
    {
        $statement = $this->connector->getConnection()
            ->prepare('SELECT * FROM users WHERE id = :id');
        $statement->execute([
            ':id' => (string)$id,
        ]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (false === $result) {
            throw new UserNotFoundException("Cannot get user");
        }

        return new User(
            $result['id'], $result['first_name'], $result['last_name'], $result['email']
        );
    }
}