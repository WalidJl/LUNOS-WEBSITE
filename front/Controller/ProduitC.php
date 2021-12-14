<?php
	include 'C:\xampp\htdocs\imen\front\config.php';
	include_once 'C:\xampp\htdocs\imen\front\Model\Produit.php';
	class ProduitsC
	{
		function triPrix()
		{
			$db = config::getConnexion();
			$sql = "SELECT * FROM produits ORDER BY prix ASC";
			
			try{
				$listeProduits = $db->query($sql);
				return $listeProduits;
			}
			   catch (Exception $e)
			   {
				   die('Erreur:'.$e->getMessage());
			   }
		
		}
		
	
		 function triPrixDesc()
		{
			$db = config::getConnexion();
			$sql = "SELECT * FROM produits ORDER BY prix DESC";
			try{
				$listeProduits = $db->query($sql);
				return $listeProduits;
			}
			   catch (Exception $e)
			   {
				   die('Erreur:'.$e->getMessage());
			   }
		
		}
		function triProduit()
		{
			
			$db = config::getConnexion(); 
			$sql = "SELECT * FROM produits ORDER BY idCategorie";
			 
			try{
			 $listeProduits = $db->query($sql);
			 return $listeProduits;
		 }
			catch (Exception $e)
			{
				die('Erreur:'.$e->getMessage());
			}
		
		}
		function rechercherproduit($nom)
	   {   
		   $db = config::getConnexion(); 
		   $sql="SELECT * FROM produits where nom LIKE '$nom%' ";
			
		   try{
			$listeProduits = $db->query($sql);
			return $listeProduits;
		}
		   catch (Exception $e)
		   {
			   die('Erreur:'.$e->getMessage());
		   }
	   }
		
		function afficherProduits(){
			$db = config::getConnexion();
			$sql="SELECT * FROM produits";
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
	
		function ajouterproduits(Produit $a)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO produits ( nom , prix, description , quantite ,idCategorie, image )
					 VALUES (:nom ,:prix, :description , :quantite ,:idCategorie,:image )
					');
					//INSERT
					$query->bindValue('nom' , $a->getNom());
					$query->bindValue('prix' , $a->getPrix());
					$query->bindValue('description' ,$a->getDes());
					$query->bindValue('quantite' ,$a->getQuantite());
					$query->bindValue('image' ,$a->getImg());
					$query->bindValue('idCategorie' ,$a->getCategorie());
					//$query->bindValue('date' ,$a->getDate());
					$query->execute();
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
		function modifierproduits(Produit $a,$id)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					"update  produits set nom=:nom ,prix=:prix,description=:description ,quantite=:quantite,idCategorie=:idCategorie,image=:image where id=$id");
					//INSERT
					$query->bindValue('nom' , $a->getNom());
					$query->bindValue('prix' , $a->getPrix());
					$query->bindValue('description' ,$a->getDes());
					$query->bindValue('quantite' ,$a->getQuantite());
					$query->bindValue('image' ,$a->getImg());
					$query->bindValue('idCategorie' ,$a->getCategorie());
					$query->execute();
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}

		function SuppProduits($id)
		{
			$db = config::getConnexion();
			try{
				$query = $db->prepare( 'DELETE FROM produits where id = :id' );
				$query->bindValue('id' , $id);
				$query->execute();
			} catch(PDOException $e)
			{die($e ->GetMessage());}	
		}
		function AccountNumber()
		{
			$db = config::getConnexion();
			$select=$db->prepare("SELECT COUNT(*) AS nb FROM produits");
			$select->execute();
			return $select->fetch();
		}
		
		function getPrdById(int $num) {
			$db = config::getConnexion();
			$sql="SELECT * FROM produits where id=$num";
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

