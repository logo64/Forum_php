<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_SESSION['user_name'])) {
    echo "Connecté en tant que : " . $_SESSION['user_name'];
} else {
    echo "Non connecté";
}


require_once "config/init.php";

echo "<pre>";
print_r($bdd->query("SELECT id, username, password, role FROM users")->fetchAll());
echo "</pre>";

$sql = "SELECT topics.*, users.username 
        FROM topics 
        LEFT JOIN users ON users.id = topics.user_id
        ORDER BY topics.id DESC";

$topics = $bdd->query($sql)->fetchAll();
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h1>🎮 Forum FGC</h1>

<?php if (isset($_SESSION['user_name'])): ?>
    <form action="/user/deco.php" method="post">
        <button type="submit">Déconnexion</button>
    </form>
<?php endif; ?>

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