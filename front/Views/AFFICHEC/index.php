<?php
	include 'C:\xampp\htdocs\imen\front\Controller\categorieC.php';	
	$Categories=new CategoriesC();
	$listeEvents=$Categories->afficherCat(); 
?>
<!doctype html> 
<html>
    <head>
        <title> Categorie </title>
            <link rel="stylesheet" type ="text/css" href="styles.css">
    </head>
    <body>
        <section>
            <div class="leftbox">
                <div class="content">
                    <h1>Categorie  </h1>
                   <!--<p>welcome</p>-->
                  <li> <a href="../AFFICHE/index.php"><p class="link">Produit</p></a></li>
                   <li><a href="index.php"><p class="link">Categorie</p></a></li>
                  
                </div>
            </div>
            <div class="table">
            <div class="categories">
		<table border="1" align="right" class="container">
			<tr>
			</tr>
			<?php
				foreach($listeEvents as $categories){
			?>
			<tr>

          

            
            <td><h1><?php echo $categories['nom']; ?></h1>
            
          
          
            </td>
			</tr>
            
			<?php
				}
			?>
		</table>
	</div>
         </section>
         


        
	
	

    </body>
</html>

    