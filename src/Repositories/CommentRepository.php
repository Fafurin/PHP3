<?php

namespace App\Repositories;

use App\Entities\Comment\Comment;
use App\Entities\EntityInterface;
use App\Exceptions\CommentNotFoundException;
use PDO;

class CommentRepository extends EntityRepository implements CommentRepositoryInterface
{

    public function save(EntityInterface $entity): void
    {
        /**
         * @var Comment $entity
         */

        $statement = $this->connector->getConnection()
            ->prepare("INSERT INTO comments (author_id, article_id, text) VALUES (:author_id, :article_id, :text)");
        $statement->execute(
            [
                ':author_id' => $entity->getAuthorId(),
                ':article_id' => $entity->getArticleId(),
                ':text' => $entity->getText(),
            ]
        );
    }

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