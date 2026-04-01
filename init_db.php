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

echo "DB OK";