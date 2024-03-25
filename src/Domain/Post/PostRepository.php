<?php

declare(strict_types=1);

namespace App\Domain\Post;

interface PostRepository
{
    /**
     * @return Post[]
     */
    public function findAll(): array;



}
