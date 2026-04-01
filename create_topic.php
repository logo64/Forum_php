<?php
include "config/config.php";
include "config/bdd.php";

if (!isconnect()) {
    header("location:connexion.php");
    exit;
}

if (isset($_POST['title'], $_POST['category'])) {

    $title = htmlspecialchars($_POST['title']);
    $category = htmlspecialchars($_POST['category']);

    $req = $bdd->prepare("SELECT id FROM user WHERE Username = ?");
    $req->execute([$_SESSION['user_name']]);
    $user = $req->fetch();

    $sql = "INSERT INTO topics (title, category, user_id)
            VALUES (?, ?, ?)";
    $bdd->prepare($sql)->execute([$title, $category, $user['id']]);

    header("location:index.php");
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Créer un topic</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Titre">
    
    <select name="category">
        <option>Smash</option>
        <option>Street Fighter</option>
        <option>Guilty Gear</option>
    </select>

    <button>Créer</button>
</form>
</div>