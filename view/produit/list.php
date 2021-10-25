  <?php
	           
	        foreach ($tab_p as $p){
				
				//affichage
				$nom = $p->getNomProduit();
	            $description = $p->getDescription();
	            $photo = $p->getPhoto();
	            $prix = $p->getPrix();
	            $couleur = $p->getCouleur();
	       
	            
	           
	         // echo"<a href=\"http://webinfo.iutmontp.univ-montp2.fr/~puechc/PHP/projet/index.php?action=ReadByIdProduit&idProduit=".rawurlencode($p->getIdProduit()) ."\">";
	
	 

	            echo '	
	            
     
	             <div class="corps" >
		
	             <br>  <img src="assets/photo/imagesProduit/' .$photo. '" width = "300" height = "300" alt = "Aperçu" /> 
	            
	            
	            
	
	            <p>Catégorie : ' . htmlspecialchars($p->getCategorie()) . ' <br> Nom : '.$nom.' <br> Description : '.$description.'  
	
	            <br> Couleur : '.$couleur.' 
	
	
	            <br> '.$prix.' €
	
	
	
	
						
	            <form method="post" action="http://webinfo.iutmontp.univ-montp2.fr/~puechc/eCommerce/index.php?controller=Panier&action=addPanier">
	                       
	                      <br><br>  <input type="submit" value="Ajouter au panier" /> 
	                    </form><br/><br/>
	                    
	                     </div>' ;  
	
	                  
	
	           
	                           
	            }
	            
	            
	               
	
	 ?>
	

