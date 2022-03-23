<?php

namespace App\Commands\Delete;

class DeleteCommentCommandHandler extends DeleteCommandHandler
{

    public function handle(DeleteCommandInterface $command): void
    {
        $id  = $command->getId();

        $this->stmt->execute([
            ':id' => $id,
        ]);
    }

    public function getSql(): string
    {
        return
            "
                DELETE FROM comments WHERE id = :id;
             ";
    }
}