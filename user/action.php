<?php
session_start();
include "config/bdd.php";

// =========================
// INSCRIPTION
// =========================
if (isset($_POST['btn_add'])) {

    $username = htmlspecialchars($_POST['Username']);
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $mail = htmlspecialchars($_POST['Mail']);

    $sql = "INSERT INTO users (username, password, mail, role) VALUES (?, ?, ?, 'user')";
    $req = $bdd->prepare($sql);
    $req->execute([$username, $password, $mail]);

    header("Location: connexion.php");
    exit;
}


// =========================
// LOGIN
// =========================
if (isset($_POST['login']) && isset($_POST['password'])) {

    $pseudo = $_POST['login'];
    $mdp = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $req = $bdd->prepare($sql);
    $req->execute([$pseudo]);
    $user = $req->fetch();

    if ($user && password_verify($mdp, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: index.php");
        exit;
    } else {
        echo "Login incorrect";
    }
}