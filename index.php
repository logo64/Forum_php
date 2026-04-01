<?php
include "config/config.php";
include "config/bdd.php";

$sql = "SELECT topics.*, user.Username 
        FROM topics 
        JOIN user ON user.id = topics.user_id
        ORDER BY topics.ID DESC";

$topics = $bdd->query($sql)->fetchAll();
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h1>🎮 Forum FGC</h1>

<?php if (isconnect()): ?>
    <a class="btn" href="create_topic.php">+ Nouveau topic</a>
<?php endif; ?>

<?php foreach ($topics as $topic): ?>
<div class="card">
    <div class="category"><?= $topic['category'] ?></div>
    <a href="topic.php?id=<?= $topic['ID'] ?>">
        <?= htmlspecialchars($topic['title']) ?>
    </a>
    <div class="meta">
        par <?= $topic['Username'] ?> • <?= $topic['created_at'] ?>
    </div>
</div>
<?php endforeach; ?>
</div>