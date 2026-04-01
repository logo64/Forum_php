<?php
require_once "config/init.php";


// 🔹 INSCRIPTION
if (isset($_POST['btn_add'])) {

    $username = htmlspecialchars($_POST['Username']);
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $mail = htmlspecialchars($_POST['Mail']);

    $stmt = $bdd->prepare("INSERT INTO users (username, password, mail, role)
    VALUES (?, ?, ?, 'user')");

    $stmt->execute([$username, $password, $mail]);

    header('Location: connexion.php');
    exit;
}


// 🔹 LOGIN
if (isset($_POST['login'])) {

    $pseudo = $_POST['login'];
    $mdp = $_POST['password'];

    $stmt = $bdd->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$pseudo]);

    $user = $stmt->fetch();

    if ($user && $mdp === $user['password']) {
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header('Location: index.php');
        exit;
    } else {
        header("Location: connexion.php?error=1");
exit;
    }
}