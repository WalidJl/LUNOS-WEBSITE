<?php
	class Categorie{
		private $id=null;
		private $nom=null;
		
        /*private $Gender=null;*/

		////////////////////CUNSTRUCT
		function __construct($nom){
			$this->nom=$nom;
			
		//	$this->image=$date;

		}
		/////////////////////GET
		function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		
		function setNom(string $nom){
			$this->nom=$nom;
		}
		
	}
?>