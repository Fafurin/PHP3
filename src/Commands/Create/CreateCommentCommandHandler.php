<?php

namespace App\Commands\Create;

class CreateCommentCommandHandler extends CreateCommandHandler
{
    /**
     * @var CreateCommentCommand $command
     */
    public function handle(CreateCommandInterface $command): void
    {
        $comment = $command->getComment();

        $this->stmt->execute([
            'author_id' => $comment->getAuthorId(),
            'article_id' => $comment->getArticleId(),
            'text' => $comment->getText()
        ]);
    }

    public function getSql():string
    {
        return
            "
                INSERT INTO comments (author_id, article_id, text) 
                VALUES (:author_id, :article_id, :text)
             ";
    }
}