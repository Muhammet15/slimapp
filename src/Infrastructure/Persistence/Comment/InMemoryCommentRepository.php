<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Comment;

use App\Domain\Comment\Comment;
use App\Domain\Comment\CommentNotFoundException;
use App\Domain\Comment\CommentRepository;
use mysqli;

class InMemoryCommentRepository implements CommentRepository
{

    private function connectToDatabase(): mysqli
    {
        $dbHost = "127.0.0.1"; 
        $dbUser = "root"; 
        $dbPass = ""; 
        $dbName = "slimapi"; 
        
        $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    
        if ($mysqli->connect_errno) {
            die("Veritabanı bağlantı hatası (" . $mysqli->connect_errno . "): " . $mysqli->connect_error);
        }
    
        return $mysqli;
    }

    public function findAll(): array
    {
        $mysqli = $this->connectToDatabase();
        $statement = $mysqli->query("SELECT * FROM comments");
        $commentsData = $statement->fetch_all(MYSQLI_ASSOC);

        $comments = [];
        foreach ($commentsData as $commentData) {
            $comment = new Comment(
                (int)$commentData['id'],
                (int)$commentData['postId'],
                $commentData['name'],
                $commentData['email'],
                $commentData['body']
            );
            $comments[] = $comment;
        }

        return $comments;
    }
    public function findCommentsOfId(int $id): array
    {
        $mysqli = $this->connectToDatabase();
        $query = "SELECT * FROM comments WHERE postId = '$id'";
        $statement = $mysqli->query($query);
        
        if (!$statement) {
            die("Sorgu hatası: " . $mysqli->error);
        }
    
        $comments = [];
        while ($commentData = $statement->fetch_assoc()) {
            $comment = new Comment(
                (int)$commentData['id'],
                (int)$commentData['postId'],
                $commentData['name'],
                $commentData['email'],
                $commentData['body']
            );
            $comments[] = $comment;
        }
    
        return $comments;
    }
    
}
