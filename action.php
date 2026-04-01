<?php
include "config/config.php";
include "config/bdd.php";

if (isset($_POST['btn_add'])) {

    $Username = htmlspecialchars($_POST['Username']);
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $Mail = htmlspecialchars($_POST['Mail']);

    $sql = "INSERT INTO user (Username, Password, Mail, Role) VALUES (?, ?, ?, 'User')";
    $bdd->prepare($sql)->execute([$Username, $Password, $Mail]);

    header('location:index.php');
    exit;
}

// LOGIN
$pseudo = $_POST['login'] ?? '';
$mdp = $_POST['password'] ?? '';

$sql = "SELECT * FROM user WHERE Username = ?";
$req = $bdd->prepare($sql);
$req->execute([$pseudo]);
$user = $req->fetch();

if ($user && password_verify($mdp, $user['Password'])) {
    $_SESSION["connection"] = true;
    $_SESSION["user_name"] = $user['Username'];
    header("location:index.php");
} else {
    header("location:connexion.php");
}