<?php

$db = new PDO('sqlite:forum.db');

$db->exec("
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT,
    password TEXT,
    mail TEXT,
    role TEXT
);
");

$db->exec("
CREATE TABLE IF NOT EXISTS topics (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT,
    content TEXT,
    user_id INTEGER
);
");

$db->exec("
CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    content TEXT,
    topic_id INTEGER
);
");

$exists = $db->query("SELECT * FROM users WHERE username = 'admin'")->fetch();

if (!$exists) {
    $db->exec("
        INSERT INTO users (username, password, role)
        VALUES ('admin', 'admin', 'admin')
    ");
}
echo "DB OK";