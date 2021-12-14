<?php
	include 'C:\xampp\htdocs\imen\front\config.php';
	include_once 'C:\xampp\htdocs\imen\front\Model\categorie.php';
	class CategoriesC
	{
		
		function afficherCat(){
			$db = config::getConnexion();
			$sql="SELECT * FROM categorie";
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
	
		function ajouterCat(Categorie $a)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO categorie ( nom )
					 VALUES (:nom   )
					');
					//INSERT
					$query->bindValue('nom' , $a->getNom());
					
					//$query->bindValue('date' ,$a->getDate());
					$query->execute();
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
		function modifiercategories(Categorie $a,$id)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					"update  categorie set nom=:nom  where id=$id");
					//INSERT
					$query->bindValue('nom' , $a->getNom());
					
					$query->execute();
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}

		function SuppCat($id)
		{
			$db = config::getConnexion();
			try{
				$query = $db->prepare( 'DELETE FROM categorie where id = :id' );
				$query->bindValue('id' , $id);
				$query->execute();
			} catch(PDOException $e)
			{die($e ->GetMessage());}	
		}
		function AccountNumber()
		{
			$db = config::getConnexion();
			$select=$db->prepare("SELECT COUNT(*) AS nb FROM categorie");
			$select->execute();
			return $select->fetch();
		}
		
		function getUserById(int $num) {
			$db = config::getConnexion();
			$sql = "select * from utilisateur where id = :num";
			$query = $db->prepare($sql);
			$query->bindValue(":num", $num);
			$query->execute();
			return $query->fetch();
		}
		
		function getPrdById(int $num) {
			$db = config::getConnexion();
			$sql="SELECT * FROM categorie where id=$num";
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		/*
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
	}
?>

