<?php

namespace App\Commands\Create;

use App\Entities\Comment\Comment;

class CreateCommentCommand implements CreateCommandInterface
{
    private Comment $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function getComment(): Comment
    {
        return $this->comment;
    }
}
