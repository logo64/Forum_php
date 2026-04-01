<?php
require_once "config/init.php";

$id = intval($_GET['id']);

$sql = "SELECT topics.*, user.Username 
        FROM topics 
        JOIN user ON user.id = topics.user_id
        WHERE topics.ID = ?";
$req = $bdd->prepare($sql);
$req->execute([$id]);
$topic = $req->fetch();

$sql = "SELECT messages.*, user.Username 
        FROM messages
        JOIN user ON user.id = messages.user_id
        WHERE topic_id = ?
        ORDER BY created_at ASC";
$req = $bdd->prepare($sql);
$req->execute([$id]);
$messages = $req->fetchAll();
?>

<link rel="stylesheet" href="style.css">

<div class="container">

<h2><?= htmlspecialchars($topic['title']) ?></h2>

<?php foreach ($messages as $msg): ?>
<div class="card message">
    <div class="author"><?= $msg['Username'] ?></div>
    <p><?= htmlspecialchars($msg['Contenue']) ?></p>
    <small><?= $msg['created_at'] ?></small>
</div>
<?php endforeach; ?>

<?php if (isconnect()): ?>
<form method="POST" action="post_message.php">
    <input type="hidden" name="topic_id" value="<?= $id ?>">
    <textarea name="message"></textarea>
    <button>Envoyer</button>
</form>
<?php endif; ?>

</div>