<?php
	class Event{
		private $id=null;
		private $nom=null;
		private $description=null;
		private $date=null;
        /*private $Gender=null;*/

		////////////////////CUNSTRUCT
		function __construct($nom, $description , $date){
			$this->nom=$nom;
			$this->description=$description;
			$this->date=$date;
		}
		/////////////////////GET
		function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		function getDes(){
			return $this->description;
		}
		function getDate(){
			return $this->date;
		}
		///////////////////////SET
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setDes(string $description){
			$this->description=$description;
		}
		function setDate(string $date){
			$this->date=$date;
		}
	}
?>