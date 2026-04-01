<?php
$dsn = 'mysql:dbname=forum;host=localhost';
$user = 'root';
$password = '';

ALTER TABLE topics ADD title VARCHAR(255);
ALTER TABLE topics ADD category VARCHAR(100);
ALTER TABLE topics ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE messages ADD topic_id INT;
ALTER TABLE messages ADD user_id INT;
ALTER TABLE messages ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP;

try {
    $bdd = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}