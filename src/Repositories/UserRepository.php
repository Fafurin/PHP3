<?php

namespace App\Repositories;

use App\config\SqLiteConfig;
use App\Connections\SqLiteConnector;
use App\Entities\EntityInterface;
use App\Entities\User\User;
use App\Exceptions\UserNotFoundException;
use PDO;

class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    public function save(EntityInterface $entity):void{

        /**
         * @var User $entity
         */

        $statement = $this->connector->getConnection()
            ->prepare("INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)");
        $statement->execute(
            [
                ':first_name' => $entity->getFirstName(),
                ':last_name' => $entity->getLastName(),
                ':email' => $entity->getEmail(),
            ]
        );
    }

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