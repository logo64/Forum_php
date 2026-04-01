<?php
include "../config/config.php";
include "../config/bdd.php";

if (isset($_POST['btn_add'])) {

    $Username = htmlentities($_POST['Username']);
    $Password = htmlentities($_POST['Password']);
    $Mail = htmlentities($_POST['Mail']);
    $Role = htmlentities($_POST['Role']);


    $sql = "INSERT INTO user (Username, Password, Mail, Role)
    VALUES ('" . $Username . "', '" . $Password . "', '" . $Mail . "', '" . $Role . "')";

    $requete = $bdd->prepare($sql);
    if (!$requete->execute()) {
        die('error');
    }
    header('location:admin.php');
    die;
}

if (isset($_POST['btn_update'])) {
    if (isset($_POST['id'])) {
        $id = intval($_POST['id']);
        if ($id <= 1) {
            header('location:admin.php');
            die('error');
        }
    }
    $Username = htmlentities($_POST['Username']);
    $Mail = htmlentities($_POST['Mail']);
    $Role = htmlentities($_POST['Role']);
    $sql = "UPDATE user 
            SET username= '" . $Username . "', Mail='" . $Mail . "', Role='" . $Role . "'
            WHERE id = " . $id . "";
    $requete = $bdd->prepare($sql);
    if (!$requete->execute()) {
        header('location:admin.php');
        die('error');
    }
    header('location:admin.php');
    die;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 1) {
        $sql = "DELETE FROM user
        WHERE id = " . $id;
        $requete = $bdd->prepare($sql);
        if (!$requete->execute()) {
            header('location:admin.php');
            die('error');
        }
        header('location:admin.php');
        die;
    }
}
