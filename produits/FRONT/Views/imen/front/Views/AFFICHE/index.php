<?php
	include '../../Controller\ProduitC.php';	
	$Produits=new ProduitsC();
	$listeProduits=$Produits->afficherProduits(); 
    if (isset($_POST['search']))
    {
        $listeProduits=$Produits->rechercherproduit($_POST['search']); 
    }
    if (isset($_POST['tri']))
    {
        if($_POST['tri']=="prixASC")
        {$listeProduits=$Produits->triPrix();}
        if($_POST['tri']=="prixDESC")
        {$listeProduits=$Produits->triPrixDesc();}
        if($_POST['tri']=="categorie")
       { $listeProduits=$Produits->triProduit(); }
    }
?>
<!doctype html> 
<html>
    <head>
        <title> Produit </title>
            <link rel="stylesheet" type ="text/css" href="styles.css">
    </head>
    <body>
        <section>
            <div class="leftbox">
                <div class="content">
                    <h1>Produits </h1>
                   <!--<p>welcome</p>-->
                   <li> <a href="index.php"><p class="link">Produit</p></a></li>
                   <li><a href="../AFFICHEC/index.php"><p class="link">Categorie</p></a></li>
                   
   <form method="post">
<!--<label>Search</label>-->
<input type="text" name="search">
<!--<input type="submit" name="submit">-->
<input type="submit" value="Rechercher">
	
</form>
<form action="" method="POST">
    <select name="tri" id="tri">
    <option prixASC></option>
        <option value="prixASC">prixASC</option>
        <option value="prixDESC">prixDESC</option>
        <option value="categorie">categorie</option>
        <input type="submit" value="Trier">
    </select>
    <!--<input type="submit" value="">-->
</form>



                  
                </div>
            </div>
           
            <div class="table">
            <div class="produits">
		<table border="1" align="right" class="container">
			<tr>
			</tr>
			<?php
				foreach($listeProduits as $produits){
			?>
			<tr>

          
            <td><img src="../../../images/<?php echo $produits['image']; ?>" alt="">
        <style> img{width:90px;height:90px;}</style>
            </td>
            <td><h1><?php echo $produits['nom']; ?></h1></td>
            <td><h1><?php echo $produits['prix']; ?></h1></td>
            <td><h1><?php echo $produits['quantite']; ?></h1></td>
            <td><h1><?php echo $produits['description']; ?></h1></td>
            <td><h1><?php echo $produits['idCategorie']; ?></h1></td>
            
			</tr>
            
			<?php
				}
			?>
          
		</table>
	</div>
         </section>
         


        
	
	

    </body>
</html>
