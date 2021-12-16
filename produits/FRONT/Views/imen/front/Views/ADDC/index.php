<?php
    include 'C:\xampp\htdocs\imen\front\Controller\categorieC.php';
    if(isset($_POST["submit"]))
    {   
        if (!empty($_POST["name"]))
        {  
            $a=new CategoriesC();
            //MAIL NOT EXISTED
              $NouvAd = new Categorie($_POST['name'] );
              $a->ajouterCat($NouvAd);
              header("Location:../AFFICHEC/index.php");    
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
    <link rel="stylesheet" type ="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
<form method="POST">
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Categorie</h1>
        <input type="text" placeholder="Name" name="name">
        <button type="submit" name="submit" href="../AFFICHEC/index.php">Submit</button>
      </div>
    </form>
</body>
</html>