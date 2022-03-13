<?php

namespace App\Entities\Comment;

use App\Entities\User\User;
use App\Entities\Article\Article;

class Comment implements CommentInterface
{
    public function __construct(
        private int $id,
        private User $author,
        private Article $article,
        private string $text,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthorId(): int
    {
        return $this->author->getId();
    }

    public function getArticleId(): int
    {
        return $this->article->getId();
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function __toString(): string
    {
        return sprintf(
            "[%d] %s %s %s",
            $this->getId(),
            $this->getAuthorId(),
            $this->getArticleId(),
            $this->getText(),
        );
    }
}