<?php

namespace App\Entities\Article;

use App\Entities\User\User;

class Article implements ArticleInterface
{
    public function __construct(
        private int $id,
        private User $author,
        private string $title,
        private string $text,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthorId():int
    {
        return $this->author->getId();
    }

    public function getTitle(): string
    {
        return $this->title;
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
            $this->getTitle(),
            $this->getText(),
        );
    }
}