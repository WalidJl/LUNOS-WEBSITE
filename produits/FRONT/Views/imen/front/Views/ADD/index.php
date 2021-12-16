<?php
    include 'C:\xampp\htdocs\imen\front\Controller\ProduitC.php';
    if(isset($_POST["submit"]))
    {   
        if (!empty($_POST["name"]) && $_POST['prix'] && $_POST['description'] && $_POST['quantite'] && $_POST['image'])
        {  
            $a=new ProduitsC();
            //MAIL NOT EXISTED
              $NouvAd = new Produit($_POST['name'] , $_POST['prix'] , $_POST['description'],$_POST['quantite'] ,$_POST['categorie'],$_POST['image']);
              $a->ajouterproduits($NouvAd);
              header("Location:../AFFICHE/index.php");    
        }
        //INPUT MISSING
        else
        {
            echo '<script>alert("SOMETHING MISSING")</script>';
        }      
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="styles.css">
    <title>Document</title>
</head>
<body>
<form method="POST">
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Produit</h1>
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Quantite" name="quantite">
        <input type="text" placeholder="Prix" name="prix">
        <input type="file" placeholder="Image" name="image">
        <input type="text" placeholder="Categorie" name="categorie">
        <textarea placeholder="Description..." rows="5" name="description"></textarea>
        <button type="submit" name="submit" href="../AFFICHE/index.php">Submit</button>
      </div>
    </form>
</body>
</html>