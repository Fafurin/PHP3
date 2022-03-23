<?php

namespace App\Commands\Create;

use App\Entities\Article\Article;

class CreateArticleCommand implements CreateCommandInterface
{
    private Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }
}
