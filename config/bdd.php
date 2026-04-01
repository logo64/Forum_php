<?php
$db = new PDO('sqlite:forum.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $bdd = new PDO('sqlite:' . __DIR__ . '/../forum.db');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur BDD : " . $e->getMessage());
}