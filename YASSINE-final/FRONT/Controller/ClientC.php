<?php
	include 'C:\xampp\htdocs\YASSINE\FRONT\config.php';
	include_once 'C:\xampp\htdocs\YASSINE\FRONT\Model\Client.php';
	class ForumC
	{
		
		function afficherForum(){
			$db = config::getConnexion();
			$sql="SELECT * FROM forums";
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
	
		function ajouterForum(Forum $a)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO forums ( Question , Subject  )
					 VALUES (:Question , :Subject )
					');
					//INSERT
					$query->bindValue('Question' , $a->getQuestion());
					$query->bindValue('Subject' ,$a->getSubject());
					$query->execute();
					//$id = $db->lastInsertId();
					//return $id;
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
		function ajouterAnswers(array $values)
		{
			$db = config::getConnexion();
			try
			{	
				$sql = "insert into comments (id_user, form_id, content) values (:userId, :forumId, :content)";
				$query = $db->prepare($sql);
					
					$query->execute($values);
					//$id = $db->lastInsertId();
					//return $id;
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
		function getUserById(int $num) {
			$db = config::getConnexion();
			$sql = "select * from forums where id = :num";
			$query = $db->prepare($sql);
			$query->bindValue(":num", $num);
			$query->execute();
			return $query->fetch();
		}
		function SuppForum($id)
		{
			$db = config::getConnexion();
			try{
				$query = $db->prepare( 'DELETE FROM forums where id = :id' );
				$query->bindValue('id' , $id);
				$query->execute();
			} catch(PDOException $e)
			{die($e ->GetMessage());}	
		}
		function AccountNumber()
		{
			$db = config::getConnexion();
			$select=$db->prepare("SELECT COUNT(*) AS nb FROM forums");
			$select->execute();
			return $select->fetch();
		}

		function getAllForums() {
			$db = config::getConnexion();
			$sql = "select utilisateur.Nom, forums.*, count(comments.id_comm) as totalComments from forums
			left join comments on comments.form_id = forums.id
			left join utilisateur on utilisateur.id = forums.authorId
			group by forums.id";
			$select=$db->prepare($sql);
			$select->execute();
			return $select->fetchAll();
		}
		function getCommentsOfOneForum(array $values) {
			$db = config::getConnexion();
			$sql = "select * from comments inner join forums on forums.id = comments.form_id where forums.id = :id";
			$select=$db->prepare($sql);
			$select->execute($values);
			return $select->fetchAll();
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
		}
		*/
	}
?>