<?php

declare(strict_types=1);

namespace App\Domain\Comment;

interface CommentRepository
{
    /**
     * @return Comment[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Comment[]
     * @throws CommentNotFoundException
     */
    public function findCommentsOfId(int $id): array;

}
