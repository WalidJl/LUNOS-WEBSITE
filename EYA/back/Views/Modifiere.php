<?php 


include 'C:\xampp\htdocs\EYA\front\Controller\ClientC.php';	

if(!isset($_POST['id'])||!isset($_POST['nom'])||!isset($_POST['date']))
{
	echo "erreur de ";
}




	$par=new EventsC();
	$listepart=$par->Modifierevent($_POST['id'],$_POST['nom'],$_POST['date']); 
header('location:http://localhost:7882/EYA/back/Views/index.php');



?>