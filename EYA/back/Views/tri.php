<?php
	include 'C:\xampp\htdocs\EYA\front\Controller\ClientC.php';	
	
	//sup
	$Event=new EventsC();
	$listeEvent=$Event->tri(); 
	$par=new EventsC();
	$listepart=$par->afficherpartip(); 
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
        <a href="index.php" >Retoure </a>
		<table border="1" align="right" class="f1-table">
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Description</th>
				<th>Date</th>
						<th>Nombre de paticipent</th>
							<th>enable</th>
				<th>Modifier</th>
				<th>Supprimer</th>
				
			</tr>
			<?php
				foreach($listeEvent as $events){
			?>
			<p><?php
$x=date('Y-m-d ');
$s=$events['date'];
$a=strtotime(date('Y-m-d '));
$b=strtotime($s);
 if($a>$b)
 {
   $par=new EventsC();
	$tes=$par->updateen($events['id']); 
   
 } 
 else
 {
 	   $par=new EventsC();
	$tes=$par->updaten($events['id']); 
 
 }

 
?></p>
			<tr>
				<td><?php echo $events['id']; ?></td>
				<td><?php echo $events['nom']; ?></td>
				<td><?php echo $events['description']; ?></td>
				<td><?php echo $events['date']; ?></td>
				
					<td><?php echo $events['nbrpartip']; ?></td>
						<td><?php echo $events['enable']; ?></td>
				
					<!---<form method="" action="">
						<input type="submit" name="Modifier" value="Modifier">
					</form>
					--->
				<td> 
<form method="GET" action="Modifieevent.php">
<input type="submit" value="Modifier">
<input type="hidden" value="<?php echo $events['id'] ?>" name="id">
</form></td>
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
		<h1>Liste des participent

		</h1>

				<table border="1" align="right" class="f1-table">
			<tr>
				<th>id_participent</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Id_event</th>
			
				<th>Supprimer</th>
				<th>Modifier</th>
				
			</tr>
			<?php
				foreach($listepart as $par){
			?>
			<tr>
				<td><?php echo $par['ident']; ?></td>
				<td><?php echo $par['nom']; ?></td>
				<td><?php echo $par['prenom']; ?></td>
				<td><?php echo $par['id_event']; ?></td>
				
				
				
			       
                                   <td>     <form method="post" action="supprumer.php">
<input type="submit" value="Supprimer">
<input type="hidden" value="<?php echo $par['ident'] ?>" name="ident">
</form></td>
<td> 
<form method="GET" action="Modifier.php">
<input type="submit" value="Modifier">
<input type="hidden" value="<?php echo $par['ident'] ?>" name="ident">
</form></td>
              
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
								
								<a href="ADD/index.php">Ajouter un Event</a>
								
							</li>
							<li>
								
								<a href="GRAPH/index.php">GRAPHS</a>
								
							</li>

						</div>
		</div>  
		



		<div class="backbu">
				 <form method="POST" action="stat.php">
                                        
                    <button type="submit"  id="statistique"  class="btn btn-info" href="stat.php"> statistique</button>
                    
                    
                                        </form>	
										
		</div>

		

	</body>

</html>
