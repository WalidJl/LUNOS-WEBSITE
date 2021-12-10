<?php
	include 'C:\xampp\htdocs\WEB\Site\config.php';
	include_once 'C:\xampp\htdocs\WEB\Site\Model\Client.php';
	class ClientC
	{
		
		function afficherClients(){
			$db = config::getConnexion();
			$sql="SELECT * FROM utilisateur";
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
	
		function ajouterclient(Client $a)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO utilisateur ( nom , prenom , email , phone , password , Gender  )
					 VALUES (:nom , :prenom , :email , :phone  , :pass , :gender  )
					');
					//INSERT
					$query->bindValue('nom' , $a->getNom());
					$query->bindValue('prenom' ,$a->getPrenom());
					$query->bindValue('email' ,$a->getEmail());
					$query->bindValue('phone' , $a->getPhone());
					$query->bindValue('pass' , $a->getPass());
					$query->bindValue('gender' , $a->getGender());
					$query->execute();
					$id = $db->lastInsertId();
					return $id;
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
		
		function SuppClients($id)
		{
			$db = config::getConnexion();
			try{
				$query = $db->prepare( 'DELETE FROM events where id = :id' );
				$query->bindValue('id' , $id);
				$query->execute();
				$query = $db->prepare( 'DELETE FROM ProfilePictures where userId = :id' );
				$query->bindValue('id' , $id);
				$query->execute();
				$query = $db->prepare( 'DELETE FROM admins where id = :id' );
				$query->bindValue('id' , $id);
				$query->execute();
				$query = $db->prepare( 'DELETE FROM forums where authorId = :id' );
				$query->bindValue('id' , $id);
				$query->execute();
				$query = $db->prepare( 'DELETE FROM utilisateur where id = :id' );
				$query->bindValue('id' , $id);
				
				$query->execute();
			} catch(PDOException $e)
			{die($e ->GetMessage());}	
		}
		
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
		function verifyEmailClient ($email) {
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
		}
		function getImageOfUser(array $values) {
			$db = config::getConnexion();
			$query= $db->prepare("select * from ProfilePictures where userId = :id");
			$query->execute($values);
			$result = $query->fetch();
			return $result;
		}
		function insertImage(array $values) {
			$db = config::getConnexion();
			$sql="insert into ProfilePictures (imageType, imageData, userId) 
				values (:imageType, :imageData, :userId)";
			$liste = $db->prepare($sql);
			$liste->execute($values);
		}
		function changeImage(array $values) {
			$db = config::getConnexion();
			$sql="update ProfilePictures set imageData = :imageData, imageType = :imageType where userId = :userId";
			$liste = $db->prepare($sql);
			$liste->execute($values);
		}
	}
	/*function InsertImage()
	{
			// Count total files
			$countfiles = count($_FILES['files']['name']);
                    
			// Prepared statement
			$query = "INSERT INTO image (name,image) VALUES(?,?)";

			$statement = $db->prepare($query);

			// Loop all files
			for($i = 0; $i < $countfiles; $i++) {

			  // File name
			  $filename = $_FILES['files']['name'][$i];
			
			  // Location
			  $target_file = 'upload/'.$filename;
			
			  // file extension
			  $file_extension = pathinfo(
				$target_file, PATHINFO_EXTENSION);
				
			  $file_extension = strtolower($file_extension);
			
			  // Valid image extension
			  $valid_extension = array("png","jpeg","jpg");
			
			  if(in_array($file_extension, $valid_extension)) {

				// Upload file
				if(move_uploaded_file(
				  $_FILES['files']['tmp_name'][$i],
				  $target_file)
				) {

				  // Execute query
				  $statement->execute(
					array($filename,$target_file));
				}
			  }
			}
			
			echo "File upload successfully";

	}*/




	/*************************************************************************************/
	/***********************************ADMIN*************************************************/
	/*************************************************************************************/
	class AdminC
	{
		function ajouteradmin(Admin $a)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO admins ( email , password )
					 VALUES (:email, :pass)
					');
					//INSERT					
					$query->bindValue('email' ,$a->getEmailAdmin());
					$query->bindValue('pass' , $a->getPassAdmin());
					$query->execute();
					$id = $db->lastInsertId();
					return $id;
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
		function verifyEmailAdmin ($email) {
			$db = config::getConnexion();
			try{
				$query = $db->prepare("select id from admins where email = :email");
				$query->execute([
					'email' => $email ,
				]);
				$user = $query->fetch();
				return $user;
			} catch(PDOException $e)
			{die($e ->GetMessage());}
		}
		function verifyAdmin ($email, $password) {
			$db = config::getConnexion();
			try{
				$query = $db->prepare("select id from admins where email = :email and password = :password");
				$query->execute([
					'email' => $email ,
					'password' =>  $password ,
				]);
				$user = $query->fetch();
				return $user;
			} catch(PDOException $e)
			{die($e ->GetMessage());}
		}		
		function afficherAdmin(){
			$db = config::getConnexion();
			$sql="SELECT * FROM admins";
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function SuppAdmins($id){
			$db = config::getConnexion();
			try{
				$query = $db->prepare( 'DELETE FROM admins where id = :id' );
				$query->bindValue('id' , $id);
				$query->execute();
			} catch(PDOException $e)
			{die($e ->GetMessage());}	
		}
		function getAdminById(int $num) {
			$db = config::getConnexion();
			$sql = "select * from admins where id = :num";
			$query = $db->prepare($sql);
			$query->bindValue(":num", $num);
			$query->execute();
			return $query->fetch();
		}
		function ModifierAdmin( $id , $email , $password )
		{
			$db = config::getConnexion();
			try{
				$query = $db->prepare( 'UPDATE admins SET email =:email ,
				 password =:password where id = :id');
				$query->execute([
					'id' => $id ,					
					'email' => $email ,
					'password' => $password ,
				]);
				echo $query->rowCount() . "records UPDATED successfully";
			} catch(PDOException $e)
			{die($e ->GetMessage());}
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
		}
		*/
	}
	
?>

