<?php

echo'list panier' ; 
	
	
$length = count($tab_p);
	for ($i = 0; $i < $length; $i++) {;
		echo "<ul>".htmlspecialchars($tab_p[$i]).", quantite : ".htmlspecialchars($tab_q[$i])."</ul>";
		echo '<form method="post" action="index.php?action=supprPanier&controller=panier">
            	<input type="hidden" name="nomProduit" value="'.$tab_p[$i].'" />
            	<input type="submit" value="Supprimer du panier" />
            </form>';
	}

	if(isset($_SESSION['login'])){
        echo '<a href="http://webinfo.iutmontp.univ-montp2.fr/~puechc/eCommerce/index.php?created&controller=commande"> Commander </a>';
    }




?>

