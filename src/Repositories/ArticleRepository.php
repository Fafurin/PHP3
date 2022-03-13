<?php

namespace App\Repositories;

use App\Entities\Article\Article;
use App\Entities\EntityInterface;
use App\Exceptions\ArticleNotFoundException;

class ArticleRepository extends EntityRepository implements ArticleRepositoryInterface
{

    public function save(EntityInterface $entity): void
    {
        /**
         * @var Article $entity
         */

        $statement = $this->connector->getConnection()
            ->prepare("INSERT INTO articles (author_id, title, text) VALUES (:author_id, :title, :text)");
        $statement->execute(
            [
                ':author_id' => $entity->getId(),
                ':title' => $entity->getTitle(),
                ':text' => $entity->getText(),
            ]
        );
    }

    public function get(int $id): EntityInterface
    {
        $statement = $this->connector->getConnection()
            ->prepare('SELECT * FROM articles WHERE id = :id');
        $statement->execute([
            ':id' => (string)$id,
        ]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (false === $result) {
            throw new ArticleNotFoundException(sprintf("Cannot get article with id = %id", $id));
        }

        return new Article (
            $result['id'], $result['user_id'], $result['title'], $result['text']
        );
    }
}