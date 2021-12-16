<?PHP
class produit{
	private $idP=null;
	private $nomP=null;
	private $quantiteP=null;
	private $description=null;
	private $prix=null;
	private $image=null ; 

	function __construct($nomP,$quantiteP,$description,$prix,$image){
		$this->nomP=$nomP;
		$this->quantiteP=$quantiteP;
		$this->description=$description;
		$this->prix=$prix;
		$this->image=$image;

	
	}
	
	
	function getNom(){
		return $this->nomP;
	}

	function getQuantite(){
		return $this->quantiteP;
	}
	function getDescription(){
		return $this->description;
	}
	function getPrix(){
		return $this->prix;
	}
	function getimage()
  {
    return $this->image;
  }

	
	function setNom($nom){
		$this->nomP=$nom;
	}
	function setQuantite($quantiteP){
		$this->quantiteP=$quantiteP;
	}
	function setDescription($description){
		$this->description=$description;
	}
	function setPrix($prix){
		$this->prix=$prix;
	}
	 
  function setimage($image)
  {
    $this->image=$image;
  }
	
}

?>