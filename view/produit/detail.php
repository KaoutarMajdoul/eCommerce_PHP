

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Produit</title>
    </head>
    <body>
        <?php
            echo '<p> Produit d\'id ' . htmlspecialchars($tab_p->getIdProduit()) .
			' de categorie ' . htmlspecialchars($tab_p->getCategorie()) . ' (couleur ' . htmlspecialchars($tab_p->getCouleur()) .
			')'. htmlspecialchars($tab_p->getPhoto()) . '</p>';
			//mais mieux '<p> Voiture d\'immatriculation { $tab_v->getImmatriculation() } de marque'
			//<img src='../imagesProduits/'.$tab_p->getPhoto class="" alt='Photo du produit'.$tab_p->getIdProduit() />
        ?>
    </body>
</html>
