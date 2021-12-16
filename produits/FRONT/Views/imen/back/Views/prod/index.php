<?php
	include 'C:\xampp\htdocs\produits\FRONT\Views\imen\front\Controller\ProduitC.php';	
	//AFFICHAGE
	//clients
	$Produit=new ProduitsC();
	$listeProduit=$Produit->afficherProduits(); 
	if (isset($_GET['id']))
	{
		$s=new ProduitsC();
		$s->SuppProduits( (int)$_GET['id']);
		header("Location: index.php");
	}
?>
<html>
	<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="syles.css">
    </head>
	<body>
	<div class="sidebar">
        <div class="title">
            <h2><span class="fa fa-user-o"></span>LUNOS</h2>
        </div>

        <div class="navbar">
            <ul>
            <li><a class="cl" href="" >Gestion Produit</a></li>
			<li><a class="cl" href="../cat/index.php" >Categorie</a></li>
         </ul>        
        </div>
    </div>

					
	<div class="table">
		
		<br><br><br>
		<center><h1>Liste des Produits</h1></center>
		
		<table border="1" align="right" class="f1-table">
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Image</th>
				<th>Prix</th>
				<th>Quantite</th>
				<th>Description</th>
				<th>idCategorie</th>
				<th>Modifier</th>
				<th>Supprimer</th>
				
			</tr>
			<?php
				foreach($listeProduit as $produits){
			?>
			<tr>
				<td><?php echo $produits['id']; ?></td>
				<td><?php echo $produits['nom']; ?></td>
				<td><img src="../../../images/<?php echo $produits['image']; ?>" alt=""></td> <style> img{width:90px;height:90px;}</style>
				<td><?php echo $produits['prix']; ?></td>
				<td><?php echo $produits['quantite']; ?></td>
				<td><?php echo $produits['description']; ?></td>
				<td><?php echo $produits['idCategorie']; ?></td>
				
				
				
				<td>
					<!---<form method="" action="">
						<input type="submit" name="Modifier" value="Modifier">
					</form>
					--->
					<div class="Modsupp">
					<a href ="../prod/EDIT/index.php?id=<?php echo $produits['id'];?>"><span>Modifier</span></a>
					</div>
				</td>
				<td> 

						<a href="index.php?id=<?php echo $produits['id'];?>">
							<button class="noselect">
								<span class='text'>Delete
								</span>
								<span class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
									</svg>
								</span>
							</button>

				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</div>
		
	
        <div class="nav">
					<input type="checkbox">
						<span></span>
						<span></span>
						<div class="menu">
							<li>
								
								<a href="../../../front/Views/ADD/index.php">Ajouter un Produit</a>
								
							</li>
							<li>
								
								<a href="statistique.php">STAT</a>
								
							</li>
							
						</div>
		</div>  
		
		
		

		

		<div class="backbu">
				<a href="../../../../../../../WEB/back/Views/BACKFRONT/index.php" class="btn">
					<span class="text">Text</span>
					<span class="flip-front">Go Back</span>
					<span class="flip-back">Back</span>
				</a>

				
		</div>
<!--
		<div class="backbu">
				 <form method="POST" action="statistique.php">
                                        
                    <button type="submit"  id="statistique"  class="btn btn-info" href="statistique.php"> statistique</button>
                    
                    
                                        </form>	
										
		</div>

			-->
	</body>
</html>

