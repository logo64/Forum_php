<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Forum post list - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="display.css">
</head>

<body>
   <?php
include "../config/config.php";
include "../config/bdd.php";

if (!isconnect() || $_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}

$users = $bdd->query("SELECT * FROM user")->fetchAll();
?>

<h1>Admin</h1>

<a href="add.php">Ajouter</a>

<?php foreach ($users as $user): ?>
    <p>
        <?= $user['Username'] ?>
        <a href="update.php?user=<?= $user['id'] ?>">Modifier</a>
        <a href="action.php?id=<?= $user['id'] ?>">Supprimer</a>
    </p>
<?php endforeach; ?>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">

                    <div class="ibox-content m-b-sm border-bottom d-flex justify-content-between">
                        <div class="p-xs">
                            <div class="pull-left m-r-md">
                                <i class="fa text-navy mid-icon">
                                    <a href="../index.php"><img class="icone-home-page" src="../icone/download.png" alt=""></a>
                                </i>
                            </div>
                            <h2>Bienvenue sur le forum de la FGC</h2>
                            <span>Ici vous pouvez choisir la serie qui vous interesse puis acceder a son forum.</span>
                        </div>
                        <?php
                        if (isconnect() == true) {

                            echo '<div class="nav-item">
              <img class="icone" src="../icone/no-avatar.jpg" alt="">
            <a class="nav-link" href="user/' . $_SESSION['user_name'] . '">Profile</a>
                </div>';
                        }
                        ?>

                    </div>

                    <div class="ibox-content m-b-sm border-bottom">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Réglement
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">F.A.Q.</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                        if (isconnect() == false) {
                                            echo '<li class="nav-item">
                                        <a class="nav-link" href="connexion.php">Se connecter</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="inscription.html">Inscriver-vous</a>
                                        </li>';
                                        }
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Nous contacter</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="deco.php">Se déconnecter</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>

                    <div class="ibox-content forum-container">
                        <div class="text-center">
                            <a href="add.php" class="btn btn-success">Ajouter</a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="display" scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th class="display" scope="col">Mail</th>
                                    <th class="display" scope="col">Role</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Suppr</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td class="display" scope="row"><?php echo $user['id'] ?></td>
                                        <td><?php echo $user['Username'] ?></td>
                                        <td class="display"><?php echo $user['Mail'] ?></td>
                                        <td class="display"><?php echo $user['Role'] ?></td>
                                        <td><a href="update.php?user=<?= $user['id'] ?>" class="btn btn-warning">Modifier</a></td>
                                        <td><a href="action.php?id=<?= $user['id'] ?>" class="btn btn-danger">Suppr</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>