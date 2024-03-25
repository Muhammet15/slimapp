<?php

declare(strict_types=1);

namespace App\Domain\Comment;

use JsonSerializable;

class Comment implements JsonSerializable
{
    private ?int $id;

    private ?int $postId;

    private string $name;

    private string $email;

    private string $body;

    public function __construct(?int $id, int $postId, string $name, string $email, string $body)
    {
        $this->id = $id;
        $this->postId = $postId;
        $this->name = ucfirst($name);
        $this->email = ucfirst($email);
        $this->body = ucfirst($body);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getpostId(): ?int
    {
        return $this->postId;
    }

    public function getname(): string
    {
        return $this->name;
    }
    public function getemail(): string
    {
        return $this->email;
    }

    public function getbody(): string
    {
        return $this->body;
    }


    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'postId' => $this->postId,
            'name' => $this->name,
            'email' => $this->email,
            'body' => $this->body,
        ];
    }
}
