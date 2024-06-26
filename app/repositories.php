<?php

declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use App\Domain\Post\PostRepository;
use App\Infrastructure\Persistence\Post\InMemoryPostRepository;
use App\Domain\Comment\CommentRepository;
use App\Infrastructure\Persistence\Comment\InMemoryCommentRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        PostRepository::class => \DI\autowire(InMemoryPostRepository::class),
        CommentRepository::class => \DI\autowire(InMemoryCommentRepository::class),
    ]);
};
