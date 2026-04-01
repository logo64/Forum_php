<?php
include "config/config.php";
include "config/bdd.php";


// 🔹 INSCRIPTION
if (isset($_POST['btn_add'])) {

    $Username = htmlspecialchars($_POST['Username']);
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $Mail = htmlspecialchars($_POST['Mail']);

    $stmt = $bdd->prepare("INSERT INTO user (Username, Password, Mail, Role)
    VALUES (?, ?, ?, 'user')");

    $stmt->execute([$Username, $Password, $Mail]);

    header('Location: connexion.php');
    exit;
}


// 🔹 LOGIN
if (isset($_POST['login'])) {

    $pseudo = $_POST['login'];
    $mdp = $_POST['password'];

    $stmt = $bdd->prepare("SELECT * FROM user WHERE Username = ?");
    $stmt->execute([$pseudo]);

    $user = $stmt->fetch();

    if ($user && password_verify($mdp, $user['Password'])) {
        $_SESSION['user_name'] = $user['Username'];
        $_SESSION['role'] = $user['Role'];

        header('Location: index.php');
        exit;
    } else {
        echo "Login incorrect";
    }
}