

<?php

require_once File::build_path(array("model","ModelProduit.php")); // chargement du modèle
require_once File::build_path(array("model","ModelUtilisateur.php")); // chargement du modèle

class ControllerProduit {
	
    public static function readAll() {
        $tab_p = ModelProduit::getAllProduit();//appel au modèle pour gerer la BD
		//"redirige" vers la vue
		$controller='produit';
		$view='list';
		$pagetitle='Liste des produits';
		require File::build_path(array("view","view.php"));
	}
    
    public static function create() {
		if (empty($_SESSION['user'])){//acces formulaire de creation possible que si connecté
            header('Location: index.php?controller=User&action=connexion');
            die();//sinon redirige vers page de connexion
        }

		$controller='produit';
		$view='create';
		$pagetitle='Création du produit';
		require File::build_path(array("view","view.php"));		
    }
    
    public static function created() {
		if (empty($_SESSION['user'])){//creation possible que si connecté
            header('Location: index.php?controller=User&action=connexion');
            die();//sinon redirige vers page de connexion
        }
		$target_dir = "../../assets/photo/imagesProduit/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		 // Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		 // Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	//	if(!ModelUtilisateur::hasUser($_SESSION['user']['id'])  || strlen $_POST['nomProduit'] > 100)
	//	!ModelProduit::hasCategorie($_POST['categorie'])
	//	){}
        $v = new ModelProduit($_SESSION['user']['id'],$_POST['nomProduit'], $_POST['categorie'], $_POST['description'], $_POST['prix'], $_POST['genre'], $_POST['couleur'], $_POST['taille'], $_FILES['fileToUpload']['name']);
        $v->save();
		$tab_p = ModelProduit::getAllProduit();
		$controller='produit';
		$view='created';
		$pagetitle='Liste des produits';
		require File::build_path(array("view","view.php"));
    }
    
    public static function delete() {
        if(isset($_GET['idProduit'])){//isset ret vrai si diff de null
			$boolean = ModelProduit::deleteProduitByIdProduit($_GET['idProduit']);
			
			$tab_p = ModelProduit::getAllProduit();
			if (empty($tab_p)){//empty ret faux si cest vide ou 0		
				//require File::build_path("view","produit","error.php");
				$controller='produit';
				$view='error';
				$pagetitle='Erreur';
				require File::build_path(array("view","view.php"));
			}
			else{
				//require File::build_path(array("view","produit","detail.php"));
				$controller='produit';
				$view='delete';
				$pagetitle='Produit supprimé, liste des produits';
				require File::build_path(array("view","view.php"));
			}//.. pour revenir en arriere
		}
        else{
			//require File::build_path(array("view","produit","error.php"));
			$controller='produit';
			$view='error';
			$pagetitle='Erreur';
			require File::build_path(array("view","view.php"));
		}
    }
    
    public static function readByCategorie() {
		if(isset($_GET['categorie'])){//isset ret vrai si diff de null
			$tab_p = ModelProduit::getProduiteByCategorie($_GET['categorie']);
			if (empty($tab_p)){//empty ret faux si cest vide ou 0		
					//require File::build_path("view","produit","error.php");
					$controller='produit';
					$view='error';
					$pagetitle='Erreur';
					require File::build_path(array("view","view.php"));		
			}
			else{
				//require File::build_path(array("view","produit","list.php"));
				$controller='produit';
				$view='list.php';
				$pagetitle='Produit par catégorie : '.$_GET['categorie'];
				require File::build_path(array("view","view.php"));	
				}//.. pour revenir en arriere
		}
        else{
			$controller='produit';
			$view='error';
			$pagetitle='Erreur';
			require File::build_path(array("view","view.php"));	
		}
    }
    public static function recherche(){
		//require File::build_path(array("view","produit","recherche.php"));

		$controller='produit';

		$view='recherche';

		$pagetitle='Recherche produit';

		require File::build_path(array("view","view.php"));
	}
    
    public static function rechercher(){
		//Traitement de la requête
		if(isset($_GET['recherche']) && isset($_GET['genre']) ){
			//Si user à entrer quelque chose alors on traite sa requête
			$tab_p = ModelProduit::getProduitByNameAndGenre($_GET['recherche'],$_GET['genre']);
			if (empty($tab_p)){//empty ret faux si cest vide ou 0		
				//require File::build_path(array("view","produit","error.php"));
				$controller='produit';
				$view='error';
				$pagetitle='Erreur';
				require File::build_path(array("view","view.php"));	
			}
			else{
				//require File::build_path(array("view","produit","list.php"));  //"redirige" vers la vue
				$controller='produit';
				$view='list';
				$pagetitle='Produits de recherche';
				require File::build_path(array("view","view.php"));
			}
		}
		else{
			//require File::build_path("view","produit","error.php");
			$controller='produit';
			$view='error';
			$pagetitle='Erreur';
			require File::build_path(array("view","view.php"));
		}
	}
    
	public static function readByIdProduit() {
		if(isset($_GET['idProduit'])){//isset ret vrai si diff de null
			$tab_p = ModelProduit::getProduitByIdProduit($_GET['idProduit']);
			if (empty($tab_p)){//empty ret faux si cest vide ou 0		
				//require File::build_path("view","produit","error.php");
				$controller='produit';
				$view='error';
				$pagetitle='Erreur';
				require File::build_path(array("view","view.php"));
			}
			else{
				//require File::build_path(array("view","produit","detail.php"));
				$controller='produit';
				$view='detail';
				$pagetitle='Détail du Produit';
				require File::build_path(array("view","view.php"));
			}//.. pour revenir en arriere
		}
        else{
			//require File::build_path(array("view","produit","error.php"));
			$controller='produit';
			$view='error';
			$pagetitle='Erreur';
			require File::build_path(array("view","view.php"));
		}
    }
  
    //detail a un bouton ajouter au panier qui 
    
}
?>


