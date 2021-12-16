 <?php 

include_once '../../FRONT/Model/partip.php';
include 'C:\xampp\htdocs\EYA\front\Controller\ClientC.php';	

if(!isset($_POST['ident'])||!isset($_POST['id_event'])||!isset($_POST['nom'])||!isset($_POST['prenom']))
{
	echo "erreur de ";
}

$ser=new  partip($_POST['ident'],$_POST['nom'], $_POST['prenom'],$_POST['id_event']);


	$par=new EventsC();
	$listepart=$par->Modifierpart($ser); 
header('location:http://localhost:7882/EYA/back/Views/index.php');



?>