<?php

declare(strict_types=1);

namespace App\Application\Actions\Comment;

use App\Application\Actions\Action;
use App\Domain\Comment\CommentRepository;

abstract class CommentAction extends Action
{
    protected CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
}
