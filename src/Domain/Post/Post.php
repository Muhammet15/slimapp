<?php

declare(strict_types=1);

namespace App\Domain\Post;

use JsonSerializable;

class Post implements JsonSerializable
{
    private ?int $id;

    private ?int $userId;

    private string $title;

    private string $body;

    public function __construct(?int $id, int $userId, string $title, string $body)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = ucfirst($title);
        $this->body = ucfirst($body);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getuserId(): ?int
    {
        return $this->userId;
    }

    public function gettitle(): string
    {
        return $this->title;
    }

    public function getbody(): string
    {
        return $this->body;
    }


    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->userId,
            'title' => $this->title,
            'body' => $this->body,
        ];
    }
}
