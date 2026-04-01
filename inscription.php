<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>Forum post list - Bootdey.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">

          <div class="ibox-content m-b-sm border-bottom">
            <div class="p-xs">
              <div class="pull-left m-r-md">
                <i class="fa text-navy mid-icon">
                  <a href="index.php"><img class="icone-home-page" src="icone/download.png" alt=""></a>
                </i>
              </div>
              <h2>Bienvenue sur le forum de la FGC</h2>
              <span>Ici vous pouvez choisir la serie qui vous interesse puis acceder a son forum.</span>
            </div>
          </div>

          <div class="ibox-content m-b-sm border-bottom">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Réglement
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">F.A.Q.</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="connexion.html">Se connecter</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="inscription.php">Inscriver-vous</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Nous contacter</a>
                    </li>

                  </ul>
                </div>
              </div>
            </nav>
          </div>

          <div class="ibox-content forum-container">
                        <form action="action.php" method="POST">
                            <div class="mb-3">
                                <label for="Username" class="form-label">Username : </label>
                                <input type="text" name="Username" class="form-control" id="Username" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label">Password : </label>
                                <input type="text" name="Password" class="form-control" id="Password" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="Mail" class="form-label">Mail : </label>
                                <input type="text" name="Mail" class="form-control" id="Mail" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="Role" class="form-label">Role : </label>
                                <input type="text" name="Role" class="form-control" id="Role" aria-describedby="emailHelp">
                            </div>
                            <input type="submit" class="btn btn-primary" name="btn_add" value="Ajouter">
                        </form>
                    </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>