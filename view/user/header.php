<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/complement.css" />

    <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css" />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Vidress</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            Recherche
                        </a>
                    </li>


                    <?php

                    // Si l'utilisateur est déjà connecter
                        if  (isset($_SESSION['user'])) : ?>

                            <li class="nav-item">
                                <a class="nav-link" href="index.php?url=profile">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?= $_SESSION['user']['nom']; ?>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="index.php?url=deconnexion">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    Deconnexion
                                </a>
                            </li>

                        <?php else : ?>

                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=User&action=connexion">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    Connexion
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=User&action=inscription">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Inscription
                                </a>
                            </li>

                        <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

    <?php

    // Si on a des messages a affiché
    if (!empty($_SESSION['flash'])) :
?>
        <div id="myAlert" class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= $_SESSION['flash']; ?>
        </div>
<?php
        // On supprimer la session flash
        unset($_SESSION['flash']);

    endif; ?>

    <main>
