<?php
	include 'C:\xampp\htdocs\produits\FRONT\Views\imen\front\Controller\ProduitC.php';	
	$Produits=new ProduitsC();
	$listeProduits=$Produits->afficherProduits(); 

    
?>

<!doctype html> 
<html>
    <head>
        <title> Produit </title>
            <link rel="stylesheet" type ="text/css" href="style.css">
    </head>
    <body>
        <section>
            <div class="leftbox">
                <div class="content">
                    <h1>Welcome  </h1>
                   <!--<p>welcome</p>-->
                   <li><a href="AFFICHE/index.php"><p class="link">Produit</p></a></li>
                   <li><a href="AFFICHEC/index.php"><p class="link">Categorie</p></a></li>
                   <!--<form>
                   <input type="search" placeholder="Rechercher">
                   </form>-->
      
                  
                </div>
            </div>
           
</section>
         


        
	
	

    </body>
</html>

    