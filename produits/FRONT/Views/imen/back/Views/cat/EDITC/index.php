<?php
    include 'C:\xampp\htdocs\produits\FRONT\Views\imen\front\Controller\categorieC.php';
    $categorieC=new CategoriesC();
    $listeC=$categorieC->getPrdById($_GET['id']);
    if(isset($_POST["submit"]))
    {   
        if (!empty($_POST["name"]) )
        {  
            $a=new CategoriesC();
            //MAIL NOT EXISTED
              $NouvAd = new Categorie($_POST['name']);
              $a->modifiercategories($NouvAd,$_GET['id']);
              header("Location:../index.php");    
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
        <h1>Categorie</h1>
        <?php foreach($listeC as $prd){ ?>
        <input type="text" placeholder="Name" name="name" value="<?php echo $prd['nom'];}?>">
       
        <button type="submit" name="submit" href="../AFFICHEC/index.php">Submit</button>
      </div>
    </form>
</body>
</html>