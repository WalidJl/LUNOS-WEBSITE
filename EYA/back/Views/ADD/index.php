<?php
    include 'C:\xampp\htdocs\EYA\front\Controller\ClientC.php';
    if(isset($_POST["submit"]))
    {   
        if (!empty($_POST["name"]) && $_POST['date'] && $_POST['description'])
        {  
            $a=new EventsC();
            //MAIL NOT EXISTED
              $NouvAd = new Event($_POST['name'],$_POST['description'], $_POST['date']);
              $a->ajouterevents($NouvAd);
              header("Location:http://localhost:7882/EYA/back/Views/index.php");    
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
<script>
         function check(){
         
                 var nomR=document.frm.name.value;
                     var letters = /^[A-Za-z]+$/;
             if (!(nomR.match(letters) && nomR.charAt(0).match(/^[A-Z]+$/))){
                 document.getElementById("msg").innerHTML="Entrez uniquement Le premier chiffre en MAJ";
                 return false;
             }else{
                 return true;
             }
         }
      </script>
<form name="frm" method="POST"onsubmit="return check()">>
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Events</h1>
        <input type="text" placeholder="Name" name="name"
       > <span id="msg" style="color:red"></span>
        <input type="date" placeholder="Date" name="date">
        <textarea placeholder="Description..." rows="5" name="description"></textarea>
        <button type="submit" name="submit" href="../AFFICHE/index.php">ajouter</button>
      </div>
    </form>

    
</body>
</html>