<?php
	require_once (File::build_path(array('model','ModelPanier.php')));
	class ControllerPanier{
		
		public static function readAll(){
			$tab_p = ModelPanier::getAllPanier();
			$controller = 'panier';
			$view = 'list';
			$pagetitle = 'Mon panier';
			require (File::build_path(array('view','view.php')));  //redirige vers la vue
		}

		public static function addPanier(){
			if(isset($_SESSION['panier'])){
				$t = array_search($_POST['nomProduit'], $_SESSION['panier']['nomProduit']);
				if(!is_bool($t)){
					//corriger erreur, quantite premier produit
					$_SESSION['panier']['quantite'][$t] += 1;
				}else{
					array_push($_SESSION['panier']['nomProduit'], $_POST['nomProduit']);
					array_push($_SESSION['panier']['quantite'], 1);
				}			
				$_SESSION['nbpanier'] += 1;


			}else{
				//creation panier
				$panier = array();
				$panier['nomProduit'] = array();
				$panier['quantite'] = array();
				array_push($panier['nomChaussure'], $_POST['nomchaussure']);
				array_push($panier['quantite'], 1);
				$_SESSION['panier'] = array();
				$_SESSION['panier']['nomProduit'] = $panier['nomProduit'];
				$_SESSION['panier']['quantite'] = $panier['quantite'];
				$_SESSION['nbpanier'] = 1;
			}
			require (File::build_path(array('controller','ControllerProduit.php')));  //redirige vers la vue
			ControllerProduit::readAll();
		}

		public static function supprPanier(){
			$id = array_search($_POST['nomProduit'], $_SESSION['panier']['nomProduit']);
			if($_SESSION['panier']['quantite'][$id] >= 2){
				$_SESSION['panier']['quantite'][$id] -= 1;
			}else{
				unset($_SESSION['panier']['nomProduit'][$id]);
				unset($_SESSION['panier']['qte'][$id]);
				$_SESSION['panier']['nomProduit'] = array_values($_SESSION['panier']['nomProduit']);		
				$_SESSION['panier']['qte'] = array_values($_SESSION['panier']['quantite']);		
			}

			$_SESSION['nbpanier'] -= 1;
			ControllerPanier::readAll();
		}

		public static function resetPanier(){
			unset($_SESSION['panier']);
			unset($_SESSION['nbpanier']);
			require (File::build_path(array('controller','ControllerProduit.php')));  //redirige vers la vue
			ControllerProduit::readAll();
		}
	}
?>
