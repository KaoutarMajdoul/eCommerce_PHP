<?php
	require_once (File::build_path(array('model','ModelCommande.php')));
	class ControllerCommande{
		
		public static function readAll(){
			$tab_c = ModelCommande::getAllCommandes(); 
			$controller = 'commande';
			$view = 'list';
			$pagetitle = 'Liste des commandes';
			require (File::build_path(array('view','view.php')));  //redirige vers la vue
		}

		public static function created(){
			require_once (File::build_path(array('model','ModelUtilisateur.php')));
			$c = new ModelCommande(ModelUtilisateur::getId($_SESSION['login']),date("c"),$_SESSION['panier']);
			if($c->save() == false){
		 	 	$controller = 'produit';
			    $view = 'error';
		 	 	$pagetitle = 'Erreur';
		 	 	require (File::build_path(array('view','view.php')));
		 	}else{
		 		unset($_SESSION['panier']);
				unset($_SESSION['nbpanier']);
		 		$controller = 'commande';
		 		$view = 'created';
		 		$pagetitle = 'Creation reussie';
		 		require (File::build_path(array('view','view.php')));
		 	}
		}
	}
?>
