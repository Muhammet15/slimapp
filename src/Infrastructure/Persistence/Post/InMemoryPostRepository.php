<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Post;

use App\Domain\Post\Post;
use App\Domain\Post\PostNotFoundException;
use App\Domain\Post\PostRepository;
use mysqli;

class InMemoryPostRepository implements PostRepository
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
        $statement = $mysqli->query("SELECT * FROM posts");
        $postsData = $statement->fetch_all(MYSQLI_ASSOC);

        $posts = [];
        foreach ($postsData as $postData) {
            $post = new Post(
                (int)$postData['id'],
                (int)$postData['userId'],
                $postData['title'],
                $postData['body']
            );
            $posts[] = $post;
        }

        return $posts;
    }

}
