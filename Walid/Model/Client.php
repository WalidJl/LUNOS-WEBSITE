<?php
	class Client{
		private $id=null;
		private $Nom=null;
		private $Prenom=null;
		private $Email=null;
		private $Phone=null;
		private $Password=null;
		private $Gender=null;
		private $image=null;
        /*private $Gender=null;*/

		////////////////////CUNSTRUCT
		function __construct($nom, $prenom , $email , $phone , $pass, $gen){
			$this->Nom=$nom;
			$this->Prenom=$prenom;
			$this->Email=$email;
			$this->Phone=$phone;
			$this->Password=$pass;
			$this->Gender=$gen;
		}
		/////////////////////GET
		function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->Nom;
		}
		function getPrenom(){
			return $this->Prenom;
		}
		function getEmail(){
			return $this->Email;
		}
		function getPhone(){
			return $this->Phone;
		}
		function getPass(){
			return $this->Password;
		}
		function getGender(){
			return $this->Gender;
		}
		
		///////////////////////SET
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
		function setPhone(string $phone){
			$this->phone=$phone;
		}
		function setPass(string $pass){
			$this->pass=$pass;
		}
		function setGen(string $gen){
			$this->gen=$gen;
		}
		
	
	}


	/**************************************************************** */
	/******************ADMIIIIIIIIIIIIIIIIIIIIIIIN************** */
	class Admin{
		private $id=null;
		private $email=null;
		private $password=null;
		////////////////////CUNSTRUCT
		function __construct($email ,$pass){
			$this->email=$email;
			$this->password=$pass;
		}
		/////////////////////GET
		function getIdAdmin(){
			return $this->id;
		}
		function getEmailAdmin(){
			return $this->email;
		}
		function getPassAdmin(){
			return $this->password;
		}
		///////////////////////SET
		function setEmailAdmin(string $email){
			$this->email=$email;
		}
		function setPassAdmin(string $pass){
			$this->pass=$pass;
		}
	}


?>