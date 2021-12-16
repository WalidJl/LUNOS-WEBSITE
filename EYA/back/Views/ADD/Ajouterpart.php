

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
         
                 var nomR=document.frm.nom.value;
                 
                     var letters = /^[A-Za-z]+$/;
             if (!(nomR.match(letters) && nomR.charAt(0).match(/^[A-Z]+$/))){
                 document.getElementById("msg").innerHTML="Entrez uniquement Les premiers chiffres en MAJ";
                 return false;
             }else{
                 return true;
             }

             
         }
      </script>
      <script>
         function check(){
         
                 
                 var mal=document.frm.prenom.value;
                     var letters = /^[A-Za-z]+$/;
             
             if (!(mal.match(letters) && mal.charAt(0).match(/^[A-Z]+$/))){
                 document.getElementById("sg").innerHTML="Entrez uniquement Les premiers chiffres en MAJ";
                 return false;
             }else{
                 return true;
             }
         }
      </script>
      
     
<form method="POST" action="../ajpa.php" name="frm"onsubmit="return check()"> >
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Participer</h1>
          <input type="hidden" placeholder="Name" name="id" >
                 <input type="hidden" value="<?php
	echo $_POST['id'];   
	 ?>" name="idev">
        <input type="text" placeholder="Name" name="nom">
        <span id="msg" style="color:red"></span>
        <input type="text" placeholder="prenom" name="prenom" required>
        <span id="sg" style="color:red"></span>
        
       
        <button type="submit" name="submit" >Ajouter</button>
      </div>
    </form>

    <a href="../../../FRONT/Views/AFFICHE/index.php">
    <div class="close">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <svg viewBox="0 0 36 36" class="circle">
    <path
      stroke-dasharray="100, 100"
      d="M18 2.0845
        a 15.9155 15.9155 0 0 1 0 31.831
        a 15.9155 15.9155 0 0 1 0 -31.831"
    />
  </svg>
</div>
</a>
</body>
</html>