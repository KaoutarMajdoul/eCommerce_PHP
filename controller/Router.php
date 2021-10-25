<?php



class Router
{

    public function run ($controller, $action)
    {
		$controller_class = 'Controller'.ucfirst($controller);
        if (file_exists(File::build_path(array("controller",$controller_class.".php")))){
			
            require_once File::build_path(array("controller","Controller".$controller.".php"));

			$controller_class::$action();
        }
        // Si le fichier n'existe pas on affiche une erreur
        else
        {
            $this->show_404();
        }


    }

    /**
     * Affiche la page d'erreur 404
     */
    public function show_404 ()
    {
        echo '404';
        die();
    }
}
