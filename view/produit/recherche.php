
<?php 



	echo'	<div class="barreRecherche">
	
	
	
	<form method="get" action="http://webinfo.iutmontp.univ-montp2.fr/~puechc/eCommerce/index.php?controller=Produit&action=rechercher">

			<label for="query"> Rechercher : </label>
			<input type="search" name="recherche" maxlength="80" id="query"/>
			Genre : 
			<select name="genre">
				<option value="1"> Vetement femme </option>
				<option value="0" > Vetement homme </option>
				<option value="3" > Vetement garçon </option>
				<option value="2" > Vetement fille </option>
			</select>
			<input type="hidden" value="Produit" name="controller" >
			<input type="hidden" value="rechercher" name="action" >
			<input type="submit" value="Rechercher" >
		</form></div> ' ;

?>
