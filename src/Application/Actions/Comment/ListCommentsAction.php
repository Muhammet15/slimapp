<?php

declare(strict_types=1);

namespace App\Application\Actions\Comment;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Comment\CommentRepository;
class ListCommentsAction extends CommentAction
{

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $comments = $this->commentRepository->findAll();
        return $this->respondWithData($comments);
    }
    
}
