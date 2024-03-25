<?php

declare(strict_types=1);

namespace App\Application\Actions\Comment;

use Psr\Http\Message\ResponseInterface as Response;

class ViewCommentAction extends CommentAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $postId = (int) $this->resolveArg('post_id');
        $comment = $this->commentRepository->findCommentsOfId($postId);
        return $this->respondWithData($comment);
    }
}
