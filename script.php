<?php

// Veritabanı bilgileri
$dbHost = "127.0.0.1"; 
$dbUser = "root"; 
$dbPass = ""; 
$dbName = "slimapi"; 

$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Bağlantı hata kontrolü
if ($mysqli->connect_error) {
    die("Veritabanı bağlantı hatası: " . $mysqli->connect_error);
}

// Database.sql dosyasını çalıştır
$databaseScript = file_get_contents("database.sql");
if ($mysqli->multi_query($databaseScript) === TRUE) {
    do {
        // Sonuç setini al
        if ($result = $mysqli->store_result()) {
            $result->free();
        }
    } while ($mysqli->more_results() && $mysqli->next_result());
    echo "Database.sql dosyası başarıyla çalıştırıldı.<br>";
} else {
    echo "Hata: " . $mysqli->error;
}


// Posts tablosuna verileri ekle
$json_data = file_get_contents("https://jsonplaceholder.typicode.com/posts");
$data = json_decode($json_data, true);

foreach ($data as $item) {
    $userId = $item['userId'];
    $id = $item['id'];
    $title = $mysqli->real_escape_string($item['title']);
    $body = $mysqli->real_escape_string($item['body']);

    $query = "INSERT INTO posts (userId, id, title, body) VALUES ('$userId', '$id', '$title', '$body')";

    if ($mysqli->query($query) === TRUE) {
        echo "Veri başarıyla eklendi.<br>";
    } else {
        echo "Hata: " . $query . "<br>" . $mysqli->error . "<br>";
    }
}

// Comments tablosuna verileri ekle
$json_data = file_get_contents("https://jsonplaceholder.typicode.com/comments");
$data = json_decode($json_data, true);

foreach ($data as $item) {
    $postId = $item['postId'];
    $id = $item['id'];
    $name = $mysqli->real_escape_string($item['name']);
    $email = $mysqli->real_escape_string($item['email']);
    $body = $mysqli->real_escape_string($item['body']);

    $query = "INSERT INTO comments (postId, id, name, email, body) VALUES ('$postId', '$id', '$name', '$email', '$body')";

    if ($mysqli->query($query) === TRUE) {
        echo "Veri başarıyla eklendi.<br>";
    } else {
        echo "Hata: " . $query . "<br>" . $mysqli->error . "<br>";
    }
}

// Veritabanı bağlantısını kapat
$mysqli->close();
