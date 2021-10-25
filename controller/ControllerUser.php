<?php
/**
 * Created by PhpStorm.
 * User: Rere
 * Date: 18/11/2017
 * Time: 19:36
 */

require_once './model/ModelUtilisateur.php';
require_once './config/Conf.php';
require_once './config/Database.php';
require_once './system/library/Str.php';

class ControllerUser
{

    /**
     * Inscription d'un utilisateur
     */
    public static function inscription ()
    {
        // Si l'utilisateur est conneceté
        if (!empty($_SESSION['user'])){
            header('Location: index.php');
        }

        $simple = FALSE;

        // Si on est dans la partie traitement des informations
        if (!empty($_POST))
        {
            $db = new Database();

            $newUser = new ModelUtilisateur(
                null,
                htmlspecialchars($_POST['nom']),
                htmlspecialchars($_POST['prenom']),
                htmlspecialchars($_POST['password']),
                htmlspecialchars($_POST['confirm_password']),
                htmlspecialchars($_POST['mail']),
                htmlspecialchars($_POST['confirm_mail']),
                null,
                htmlspecialchars($_POST['adresse']),
                htmlspecialchars($_POST['ville']),
                htmlspecialchars($_POST['pays']),
                null
            );

            
            $errors = $newUser->isValid();

            // Si les données sont valides
            if ($newUser->isValid())
            {
                // On les sauvegarde
                $newUser->save($db);

                // On veyut afficher la page de succès
                $simple = TRUE;
            }

        }

        // On affiche la page de réussite
        if ($simple)
        {
            $pagetitle = 'Inscription Réussi';

            $controller = 'user';
            $view = 'inscription';

            require File::build_path(array("view", "view.php"));

        }

        // On affiche la page classique
        else
        {
            $pagetitle = 'Inscription';

            $controller = 'user';
            $view = 'inscription';

            require File::build_path(array("view", "view.php"));
        }

    }

    /**
     * Connexion d'un utilisateur
     */
    public static function connexion ()
    {
        // Si l'utilisateur est conneceté
        if (!empty($_SESSION['user'])){
            header('Location: index.php');
        }


        if (!empty($_POST))
        {

            $db = new Database();

            if (ModelUtilisateur::auth($db, $_POST['mail'], $_POST['password']))
            {
                header('Location: index.php');
                exit();
            }

            $data['errors'] = 'Les identifiants ne sont pas valides';
        }

        $pagetitle = 'Connexion';
        $controller = 'user';

        $view = 'connexion';

        require File::build_path(array("view", "view.php"));

    }

    /**
     * Deconnexion d'un utilisateur
     */
    public static function deconnexion()
    {
        // Creer un message flash
        $_SESSION['flash'] = 'A bientôt ' . $_SESSION['user']['nom'] . ' ' . $_SESSION['user']['prenom'];
        unset($_SESSION['user']);
        header('Location: index.php');
        exit();
    }

    /**
     * Confirmation d'un compte par email
     */
    public static function confirmation ()
    {
        $valid = FALSE;


        // Si on a bien les deux variables dans l'url
        if (!empty($_GET['id']) && !empty($_GET['token']))
        {
            $idUser = $_GET['id'];
            $token  = $_GET['token'];

            $db = new Database();

            if (ModelUtilisateur::confirmation($db, $idUser, $token))
            {
                $valid = TRUE;
            }
        }

        // On affiche la page que le compte est bien confirmer
        if ($valid)
        {
            $pagetitle = 'Confirmation de votre compte';

            require './view/template/header.php';
            require './view/user/confirm_success.php';
            require './view/template/footer.php';
        }
        else
        {
            // On redirige l'utilisateur vers l'index
            header('Location: index.php');
            exit();
        }

    }

    /**
     * Manage the user - Admin panel
     */
    public static function gestionUtilisateurs ()
    {

        // Si l'utilisateur n'est connecté
        if (empty($_SESSION['user'])){
            header('Location: index.php');
        }

        // Si l'utilisateur n'est pas un administrateur
        if ($_SESSION['user']['rang'] != 1)
        {
            header('Location: index.php');
        }

        $db = new Database();

        // Si on a cliquer sur supprimer
        if (!empty($_POST) && $_POST['idUser'] != $_SESSION['user']['id'])
        {
            // On supprime l'utilisateur selectionner
            ModelUtilisateur::supprimer($db, $_POST['idUser']);
        }

        // Récupération de tous les utilisateurs
        $users = ModelUtilisateur::getAllUser($db);

        // Affichage de tous les utilisateurs
        require './view/template/header.php';
        require './view/user/gestion.php';
        require './view/template/footer.php';

    }



    public function profile ()
    {

        // Si l'utilisateur n'est pas connecté
        if (empty($_SESSION['user'])){
            header('Location: index.php');
        }

        require './view/template/header.php';
        require './view/user/profile.php';
        require './view/template/footer.php';

    }

}