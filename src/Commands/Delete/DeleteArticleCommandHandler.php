<?php

namespace App\Commands\Delete;

class DeleteArticleCommandHandler extends DeleteCommandHandler
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
                DELETE FROM articles WHERE id = :id;
             ";
    }
}