
<?php
	require File::build_path(array("view", "template", "header.php"));
	// Si $controleur='produit' et $view='list',
	// alors $filepath="/chemin_du_site/view/produit/list.php"	
	require File::build_path(array("view", $controller, $view . '.php'));
	require File::build_path(array("view", "template", "footer.php"));
?>


