<?php

declare(strict_types=1);

namespace App\Application\Actions\Post;

use Psr\Http\Message\ResponseInterface as Response;

class ListPostsAction extends PostAction
{

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $posts = $this->postRepository->findAll();
        return $this->respondWithData($posts);
    }
    
}
