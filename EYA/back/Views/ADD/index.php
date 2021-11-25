<?php
    include 'C:\xampp\htdocs\EYA\front\Controller\ClientC.php';
    if(isset($_POST["submit"]))
    {   
        if (!empty($_POST["name"]) && $_POST['date'] && $_POST['description'])
        {  
            $a=new EventsC();
            //MAIL NOT EXISTED
              $NouvAd = new Event($_POST['name'] , $_POST['date'] , $_POST['description']);
              $a->ajouterevents($NouvAd);
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
    <link rel="stylesheet" type ="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
<form method="POST">
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Events</h1>
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Date" name="date">
        <textarea placeholder="Description..." rows="5" name="description"></textarea>
        <button type="submit" name="submit" href="../AFFICHE/index.php">Submit</button>
      </div>
    </form>
</body>
</html>