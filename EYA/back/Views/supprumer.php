<?php 


include 'C:\xampp\htdocs\EYA\front\Controller\ClientC.php';	



	$par=new EventsC();
	$listepart=$par->supprimerpart($_POST['ident']); 
header('location:http://localhost:7882/EYA/back/Views/index.php');

?>


