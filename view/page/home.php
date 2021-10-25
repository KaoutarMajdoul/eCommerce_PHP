

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Vidress</h1>
        <p class="lead text-muted">
            Vidress met en relation les personnes qui cherchent a vendre et a acheter des articles.

        </p>
        <p>
            <?php if (empty($_SESSION['user'])) : ?>

                <a href="index.php?controller=User&action=inscription" class="btn btn-primary">Inscription</a>
                <a href="index.php?controller=User&action=connexion" class="btn btn-secondary">Connexion</a>


            <?php else : ?>

                <a href="#" class="btn btn-primary">Acheter un article</a>
                <a href="#" class="btn btn-secondary">Vendre un article</a>

            <?php endif; ?>
        </p>
    </div>
</section>

<div class="album text-muted">
    <div class="container">

        <div class="row">


            <?php
            require File::build_path(array("view", "produit","list.php"));
            ?>


        </div>

    </div>
</div>