<?php

namespace App\Commands\Create;

class CreateArticleCommandHandler extends CreateCommandHandler
{
    /**
     * @var CreateArticleCommand $command
     */
    public function handle(CreateCommandInterface $command): void
    {
        $article = $command->getArticle();

        $this->stmt->execute([
            'author_id' => $article->getAuthorId(),
            'title' => $article->getTitle(),
            'text' => $article->getText()
        ]);
    }

    public function getSql():string
    {
        return
            "
                INSERT INTO articles (author_id, title, text) 
                VALUES (:author_id, :title, :text) 
             ";
    }
}