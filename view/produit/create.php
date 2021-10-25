
		<form method="post" action="http://webinfo.iutmontp.univ-montp2.fr/~puechc/PHP/projet/" enctype="multipart/form-data">
		  <fieldset>
			<legend>Formulaire de mise en ligne d'un produit :</legend>
			<input type="hidden"  name="idVendeur" value="1"/>
			
			<p>
			  <label for="nomProduit">Nom produit</label> :
			  <input type="text" maxlength="100" placeholder="Ex : Gilet à Pression" name="nomProduit" id="nomP" required/>
			</p>
			
			<p>
				Catégorie : 
				<select name="categorie">
					<option value="Accessoires">Accessoires</option>
					<option value="Chaussures" >Chaussures</option>
					<option value="Pantalons" >Pantalons</option>
					<option value="Robes" >Robes</option>
					<option value="Shorts" >Shorts</option>
					<option value="Sport" >Sport</option>
					<option value="T-shirt" >Tshirt</option>
					<option value="Vestes" >Vestes</option>
				</select>
			  
			</p>
			
			<p>
			  <label for="description">Description</label> :
			  <input type="text" maxlength="1000" placeholder="Ex : En coton et rayé" name="description" id="descr" required/>
			</p>
			
			<p>
			  <label for="prix">Prix</label> :
			  <input type="text" maxlength="5" placeholder="Ex : 25" name="prix" id="pr" required/>
			</p>
			
			Genre : 
			<select name="genre">
				<option value="1"> Vetement femme </option>
				<option value="0" > Vetement homme </option>
				<option value="3" > Vetement garçon </option>
				<option value="2" > Vetement fille </option>
			</select>
			<p>
			  <label for="couleur">Couleur</label> :
			  <input type="text" maxlength="30" placeholder="Ex : Vert et gris" name="couleur" id="coul" required/>
			</p>
			<p>
			  <label for="taile">Taille</label> :
			  <input maxlength="2" type="text" placeholder="Ex : 42 ou 12" name="taille" id="tail" required/>
			</p>
			<p>
				
					Choisir l'image à télécharger:
					<input type="file" name="fileToUpload" id="fileToUpload">
					
				</form>
			</p>
			
                        <input type="hidden"  name="action" value="created"/>
                        
                        
			<p>
			  <input type="submit" value="Envoyer" />
			</p>
		  </fieldset> 
		</form>


