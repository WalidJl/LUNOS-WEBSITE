<?PHP
include 'C:\xampp\htdocs\imene\FRONT\config.php';
include 'C:\xampp\htdocs\imene\FRONT\Model\produit.php';
class ProduitC {
function afficherProduit ($produit){
		echo "idP: ".$produit->getidP()."<br>";
		echo "nomP: ".$produit->getNom()."<br>";
		echo "quantiteP: ".$produit->getQuantite()."<br>";
		echo "description: ".$produit->getDescription()."<br>";
		echo "prix: ".$produit->getPrix()."<br>";
		echo "image: ".$produit->getimage()."<br>";
		
		
	}
	
	function ajouterProduit(produit $p){ 
		$db = config::getConnexion();
		try{
			$req=$db->prepare(
		'INSERT INTO client (nomP,quantiteP,description,prix,image) 
		VALUES (:nomP,:quantiteP,:description,:prix,:image)
		');
		$req->bindValue('nomP',$p->getNom());
		$req->bindValue('quantiteP',$p->getQuantite());
		$req->bindValue('description',$p->getDescription());
		$req->bindValue('prix',$p->getPrix());
        $req->bindValue('image',$p->getimage());
        $req->execute(); 
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherproduits(){
		$db = config::getConnexion();
		$sql="SELECT * FROM client";
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerproduit($idP){
		$sql="DELETE FROM client where idP= :idP";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idP',$idP);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierproduit($produit,$idP){
		$sql="UPDATE client SET idP=:idP, nomP=:nomP,quantiteP=:quantiteP,description=:description,prix=:prix,image=:image WHERE idP=:idP";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idP=$produit->getidP();
        $nomP=$produit->getNom();
        $quantiteP=$produit->getQuantite();
        $description=$produit->getDescription();
        $prix=$produit->getPrix();
        $image=$produit->getimage();
$datas = array( ':idP'=>$idP, ':nomP'=>$nomP,':quantiteP'=>$quantiteP,':description'=>$description,':prix'=>$prix,':image'=>$image);
	
		$req->bindValue(':idP',$idP);
		$req->bindValue(':nomP',$nomP);
		$req->bindValue(':quantiteP',$quantiteP);
		$req->bindValue(':description',$description);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':image',$image);		
            		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererproduit($idP){
		$sql="SELECT * from client where idP=$idP";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	

}
?>