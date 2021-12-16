<?php 

include_once '../../FRONT/Model/partip.php';
include 'C:\xampp\htdocs\EYA\front\Controller\ClientC.php';	
if(!isset($_POST['id'])||!isset($_POST['idev'])||!isset($_POST['nom'])||!isset($_POST['prenom']))
{
	echo "erreur de ";
}

$r=0;
$pr=new EventsC();
	$listert=$pr->afficherpartip();
foreach($listert as $par){
 if($par['nom']==$_POST['nom']&&$par['prenom']==$_POST['prenom']&&$par['id_event']==$_POST['idev'])
 {
 	$r=1;
 }
}
  

if($r==1)
{
	header('location:http://localhost:7882/EYA/FRONT/views/AFFICHE/exc.php');
}
else{


// ajout nbr par
    $db=config::getConnexion();
$sql="SELECT * FROM events where id=?";
$recipesStatement = $db->prepare($sql);
$recipesStatement->execute([$_POST['idev']]);
$prod=$recipesStatement->fetchall();

				foreach($prod as $events){
					$x=$events['nbrpartip']; 
				}
			$s=$x+1;
			$paa=new EventsC();
	$lee=$paa->updatepar($_POST['idev'],$s); 	



	//ajout par
$ser=new  partip($_POST['id'],$_POST['nom'], $_POST['prenom'],$_POST['idev']);


	$par=new EventsC();
	$listepart=$par->Ajouter($ser); 
header('location:http://localhost:7882/EYA/FRONT/views/AFFICHE/index.php');
}


?>