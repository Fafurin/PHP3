<?php

namespace App\Repositories;

use App\Entities\Comment\Comment;
use App\Entities\EntityInterface;
use App\Exceptions\CommentNotFoundException;
use PDO;

class CommentRepository extends EntityRepository implements CommentRepositoryInterface
{

    public function get(int $id): EntityInterface
    {
        $statement = $this->connector->getConnection()
            ->prepare('SELECT * FROM comments WHERE id = :id');
        $statement->execute([
            ':id' => (string)$id,
        ]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (false === $result) {
            throw new CommentNotFoundException(sprintf("Cannot get comment with id = %id", $id));
        }

        return new Comment (
            $result['id'], $result['user_id'], $result['article_id'], $result['text']
        );
    }
}