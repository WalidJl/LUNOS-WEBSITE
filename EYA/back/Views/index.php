<?php
	include 'C:\xampp\htdocs\EYA\front\Controller\ClientC.php';	
	//AFFICHAGE
	//clients
	$Event=new EventsC();
	$listeEvent=$Event->afficherEvents(); 
	if (isset($_GET['id']))
	{
		$s=new EventsC();
		$s->SuppEvents( (int)$_GET['id']);
		header("Location: index.php");
	}
?>
<html>
	<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    </head>
	<body>
	<div class="sidebar">
        <div class="title">
            <h2><span class="fa fa-user-o"></span>LUNOS</h2>
        </div>

        <div class="navbar">
            <ul>
            <li><a class="cl" href="" >Gestion Events</a></li>
         </ul>        
        </div>
    </div>

					
	<div class="table">
		
		<br><br><br>
		<center><h1>Liste des Evenements</h1></center>
		
		<table border="1" align="right" class="f1-table">
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Description</th>
				<th>Date</th>
				<th>Modifier</th>
				<th>Supprimer</th>
				
			</tr>
			<?php
				foreach($listeEvent as $events){
			?>
			<tr>
				<td><?php echo $events['id']; ?></td>
				<td><?php echo $events['nom']; ?></td>
				<td><?php echo $events['description']; ?></td>
				<td><?php echo $events['date']; ?></td>
				
				
				<td>
					<!---<form method="" action="">
						<input type="submit" name="Modifier" value="Modifier">
					</form>
					--->
					<div class="Modsupp">
					<a href ="../../FRONT/Views/index.php?id1=<?php echo $events['id'];?>"><span>Modifier</span></a>
					</div>
				</td>
				<td> 

						<a href="index.php?id=<?php echo $events['id'];?>">
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
								
								<a href="../../front/Views/ADD/index.php">Ajouter un Event</a>
								
							</li>
							<li>
								
								<a href="GRAPH/index.php">GRAPHS</a>
								
							</li>
						</div>
		</div>  
		
		


		<div class="backbu">
				<a href="../../../WEB/back/Views/BACKFRONT/index.php" class="btn">
					<span class="text">Text</span>
					<span class="flip-front">Go Back</span>
					<span class="flip-back">Back</span>
				</a>
		</div>



	</body>
</html>
