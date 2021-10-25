<?php
/**
 * Created by PhpStorm.
 * User: rere
 * Date: 28/11/17
 * Time: 17:39
 */

class ControllerPage
{

    public static function index ()
    {

        $pagetitle = 'Vidress - Home';

        $controller = 'page';
        $view = 'home';

        require_once File::build_path(array("model", "ModelProduit.php"));
       

        $tab_p = ModelProduit::getAllProduit();

        require File::build_path(array("view", "view.php"));

    }

}
