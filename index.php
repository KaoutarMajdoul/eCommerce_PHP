<?php

session_name('ogiegfeiugfgufeiozegiuilfzhfezo6875ejfozhioefzgi');

// On démarre la session
session_start();

// On prend la librarie afin de créer les urls
require_once './lib/File.php';

require_once './controller/Router.php';

$ROOT_FOLDER = "./";


$router = new Router();


// Récupération du controller et de l'action

// Si on a pas de controller
if (empty($_GET['controller']))
{
    $controller = 'Page';
}
else
{
    $controller = $_GET['controller'];
}

// Si on a pas d'action
if (empty($_GET['action']))
{
    // Si on a l'action dans le post
    if(!empty($_POST['action']))
    {
        $action = "readAll";
    }
    else
    {
        $action = 'index';
    }
}
else
{
    $action = $_GET['action'];
}


$router->run($controller, $action);




/*



//récupérer le tableau des méthodes d’une classe avec la fonction
$class_methods = get_class_methods('Model'.$controller);

//et tester si une valeur appartient à un tableau avec la fonction
if (in_array($action, $class_methods)){
    $controller='produit';
    $view='error.php';
    $pagetitle='Erreur';
    require File::build_path(array("view","view.php"));
}

else{
    // Appel de la méthode statique $action de ControllerProduit
    ControllerProduit::$action();
}


*/





/*

// Si on a quelque chose dans l'url
if (!empty($_GET))
{

// Récupération de l'url
$url = $_GET['url'];

// Si on est sur la page de l'inscription
if (!strcmp($url , "inscription"))
{
require_once './controller/ControllerUser.php';
ControllerUser::inscription();
}
// Si on est sur la page de connexion
else if (!strcmp($url, "connexion"))
{
require_once './controller/ControllerUser.php';
ControllerUser::connexion();
}
else if (!strcmp($url, "deconnexion"))
{
require_once './controller/ControllerUser.php';
ControllerUser::deconnexion();
}
else if (!strcmp($url, "confirmation"))
{
require_once './controller/ControllerUser.php';
ControllerUser::confirmation();
}
else if (!strcmp($url, "gestionUtilisateurs"))
{
require_once './controller/ControllerUser.php';
ControllerUser::gestionUtilisateurs();
}
else if (!strcmp($url, "profile"))
{
require_once './controller/ControllerUser.php';
ControllerUser::profile();
}
else
{
header ('Location: index.php');
exit();
}

}
// On est sur l'index
else
{
$pagetitle = 'Vente en ligne';

require './view/template/header.php';
require './view/home.php';
require './view/template/footer.php';
}

*/