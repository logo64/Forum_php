<?php
require_once "config/init.php";

if (!isconnect()) exit;

if (isset($_POST['message'], $_POST['topic_id'])) {

    $msg = htmlspecialchars($_POST['message']);
    $topic_id = intval($_POST['topic_id']);

    $sqlUser = "SELECT id FROM user WHERE Username = ?";
    $reqUser = $bdd->prepare($sqlUser);
    $reqUser->execute([$_SESSION['user_name']]);
    $user = $reqUser->fetch();

    $sql = "INSERT INTO messages (Contenue, topic_id, user_id)
            VALUES (?, ?, ?)";
    $bdd->prepare($sql)->execute([$msg, $topic_id, $user['id']]);

    header("location:topic.php?id=".$topic_id);
}