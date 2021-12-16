<?php
	class Produit{
		private $id=null;
		private $nom=null;
		private $prix=null;
		private $description=null;
		private $quantite=null;
		private $image=null;
		private $categorie=null;
		//private $image=null;
        /*private $Gender=null;*/

		////////////////////CUNSTRUCT
		function __construct($nom,$prix, $description , $quantite,$categorie,$image){
			$this->nom=$nom;
			$this->prix=$prix;
			$this->quantite=$quantite;
			$this->description=$description;
			$this->image=$image;
			$this->categorie=$categorie;

		//	$this->image=$date;

		}
		/////////////////////GET
		function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrix(){
			return $this->prix;
		}
		function getCategorie(){
			return $this->categorie;
		}
		
		function getDes(){
			return $this->description;
		}
		function getQuantite(){
			return $this->quantite;
		}
		function getImg(){
			return $this->image;
		}
		///////////////////////SET
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setNPrix(int $prix){
			$this->prix=$prix;
		}
		function setQuantite(string $quantite){
			$this->quantite=$quantite;
		}
		function setDes(string $description){
			$this->description=$description;
		}
		function setImg(string $image){
			$this->image=$image;
		}
		
	}
?>