<?php

declare(strict_types=1);

namespace App\Domain\Comment;

use App\Domain\DomainException\DomainRecordNotFoundException;

class CommentNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Comment you requested does not exist.';
}
