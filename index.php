<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config/config.php";
include "config/bdd.php";

$sql = "SELECT topics.*, users.username 
        FROM topics 
        LEFT JOIN users ON users.id = topics.user_id
        ORDER BY topics.id DESC";

$topics = $bdd->query($sql)->fetchAll();
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h1>🎮 Forum FGC</h1>

<?php foreach ($topics as $topic): ?>
<div class="card">
    <a href="topic.php?id=<?= $topic['id'] ?>">
        <?= htmlspecialchars($topic['title']) ?>
    </a>
    <div class="meta">
        par <?= $topic['username'] ?? 'inconnu' ?>
    </div>
</div>
<?php endforeach; ?>
</div>