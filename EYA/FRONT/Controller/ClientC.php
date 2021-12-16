<?php
	include 'C:\xampp\htdocs\EYA\front\config.php';
	include_once 'C:\xampp\htdocs\EYA\front\Model\Client.php';
	class EventsC
	{
		
		function afficherEvents(){
			$db = config::getConnexion();
			$sql="SELECT * FROM events";
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
	
		function ajouterevents(Event $a)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO events ( nom , description , date)
					 VALUES (:nom , :description , :date )
					');
					//INSERT
					$query->bindValue('nom' , $a->getNom());
					$query->bindValue('description' ,$a->getDes());
					$query->bindValue('date' ,$a->getDate());
					$query->execute();
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}

		function SuppEvents($id)
		{
			$db = config::getConnexion();
			try{
				$query = $db->prepare( 'DELETE FROM events where id = :id' );
				$query->bindValue('id' , $id);
				$query->execute();
			} catch(PDOException $e)
			{die($e ->GetMessage());}	
		}
		function AccountNumber()
		{
			$db = config::getConnexion();
			$select=$db->prepare("SELECT COUNT(*) AS nb FROM events");
			$select->execute();
			return $select->fetch();
		}
		/*
		function getUserById(int $num) {
			$db = config::getConnexion();
			$sql = "select * from utilisateur where id = :num";
			$query = $db->prepare($sql);
			$query->bindValue(":num", $num);
			$query->execute();
			return $query->fetch();
		}
		function verifyUser ($email, $password) {
			$db = config::getConnexion();
			try{
				$query = $db->prepare("select id from utilisateur where Email = :email and Password = :password");
				$query->execute([
					'email' => $email ,
					'password' =>  $password ,
				]);
				$user = $query->fetch();
				return $user;
			} catch(PDOException $e)
			{die($e ->GetMessage());}
		}		
		function verifyEmail ($email) {
			$db = config::getConnexion();
			try{
				$query = $db->prepare("select id from utilisateur where Email = :email");
				$query->execute([
					'email' => $email ,
				]);
				$user = $query->fetch();
				return $user;
			} catch(PDOException $e)
			{die($e ->GetMessage());}
		}		
		function ModifierClient( $id , $nom , $prenom ,$email , $phone , $pass )
		{
			$db = config::getConnexion();
			try{
				$query = $db->prepare( 'UPDATE utilisateur SET Nom = :nom ,
				Prenom = :prenom , Email =:email , Phone =:phone , Password =:pass where id = :id');
				$query->execute([
					'id' => $id ,
					'nom' =>  $nom ,
					'prenom' => $prenom ,
					'email' => $email ,
					'phone' => $phone ,
					'pass' => $pass ,
				]);
				echo $query->rowCount() . "records UPDATED successfully";
			} catch(PDOException $e)
			{die($e ->GetMessage());}
		}
		function AccountNumber()
		{
			$db = config::getConnexion();
			$select=$db->prepare("SELECT COUNT(*) AS nb FROM utilisateur");
			$select->execute();
			return $select->fetch();
		}
		function MaleNumber()
		{
			$db = config::getConnexion();
			$sql="SELECT COUNT(Gender) as total FROM utilisateur where Gender = 'M' ";
				$liste = $db->prepare($sql);
				$liste->execute();
				return $liste->fetch();
		}
		function FemaleNumber()
		{
			$db = config::getConnexion();
			$sql="SELECT COUNT(Gender) as total FROM utilisateur where Gender = 'F' ";
			$liste = $db->prepare($sql);
			$liste->execute();
			return $liste->fetch();
		}
		function VerifMail($email)
		{
			$db = config::getConnexion();
			$query= $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
			$query->execute([$email]);
			$result = $query->rowCount();
		}*/

	function afficherpartip(){
		$sql="SELECT * FROM partip ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	} 
	   function supprimerpart($numse){
 $sql="DELETE  FROM partip WHERE `ident`= $numse ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);

        }catch(Exception $e){
			die("erreur:".$e->getMessage());
   }
}

function Modifierpart($ser)
{
$sqlc= "UPDATE `partip` SET nom=:nom,prenom=:pre WHERE ident=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
	$recipesStatement->execute(['nom' =>$ser->getnom(),
		              'pre' =>$ser->getprenom(),
		            
		              'id'=>$ser->getid(),
		         ]);
}
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());
}

} 

function Ajouter($ser){
$sql= "INSERT INTO `partip` VALUES (:id,:nom, :pre, :id_ev)";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sql);
	$recipesStatement->execute([ 'id'=>$ser->getid(),
		            'nom' =>$ser->getnom(),
		            'pre'=>$ser->getprenom(),
		            'id_ev'=>$ser->getidev(),
		            
		                   
		       
		       



	]);
 }
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());

}

}
function updatepar($id,$nbr)
{
$sqlc= "UPDATE `events` SET nbrpartip=:nbr WHERE id=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
	$recipesStatement->execute(['nbr' =>$nbr,
		      
		            
		              'id'=>$id,
		         ]);
}
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());
}

} 
function updateen($id)
{
$sqlc= "UPDATE `events` SET enable=:nbr WHERE id=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
	$recipesStatement->execute(['nbr' =>1,
		      
		            
		              'id'=>$id,
		         ]);
}
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());
}

}
function Modifierevent($id,$nom,$date)
{
$sqlc= "UPDATE `events` SET nom=:nom,date=:pre WHERE id=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
	$recipesStatement->execute(['nom' =>$nom,
		              'pre' =>$date,
		            
		              'id'=>$id,
		         ]);
}
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());
}

}  
function updaten($id)
{
$sqlc= "UPDATE `events` SET enable=:nbr WHERE id=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
	$recipesStatement->execute(['nbr' =>0,
		      
		            
		              'id'=>$id,
		         ]);
}
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());
}

}



function tri(){
	$db = config::getConnexion();
	$sql="SELECT * FROM events order by nom";
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur:'. $e->getMeesage());
	}
}


	}
?>

