<?php

declare(strict_types=1);

namespace App\Application\Actions\Post;

use App\Application\Actions\Action;
use App\Domain\Post\PostRepository;

abstract class PostAction extends Action
{
    protected PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
}
