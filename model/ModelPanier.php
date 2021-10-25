<?php

  class ModelPanier {
     
     protected static $object="panier";

     
     
     
    private $commande;
    private $produit;
    private $quantite;
    
    
    
    
    function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['nomProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
	}
	//1. on regarde si le panier existe sinon on le créer
	//2. On retourne true pour des raisons de pratique lors des tests 'if'
	//La variable 'verrou' me permet de verrouiller toute action sur le panier, le verrou est à activer lorsque vous passez votre panier en paiement

    
    public static function Panier(){
        require_once 'Model.php';
        $rep = Model::$pdo->query("SELECT * FROM Paniers");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelPanier');
        $tab_paniers = $rep->fetchAll();
        return $tab_paniers;
    }

    //à faire
    // public static function getAllPaniersDeCommande(){
    //     require_once 'Model.php';
    //     $rep = Model::$pdo->query("SELECT * FROM Chaussures");
    //     $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelChaussure');
    //     $tab_chaussures = $rep->fetchAll();
    //     return $tab_chaussures;
    // }

    // a getter
    public function getCommande() {
        return $this->idCommande;  
    }

    public function getProduit(){
        return $this->idProduit;
    }

     public function getQuantite(){
        return $this->quantite;
    }
    
    public function getTotal(){
		
		
	}
        
    // a constructor
    public function __construct($c = NULL, $p = NULL, $q = NULL) {
      if (!is_null($c) && !is_null($p) && !is_null($q)) {
        // If both $m, $c and $i are not NULL, 
        // then they must have been supplied
        // so fall back to constructor with 3 arguments
        $this->idCommande = $c;
        $this->idProduit = $p;
        $this->idQuantite = $q;
      }
    }     
   
}
?>
