<?php
    include 'C:\xampp\htdocs\EYA\front\config.php';
    $db=config::getConnexion();
$sql="SELECT * FROM events where id=?";
$recipesStatement = $db->prepare($sql);
$recipesStatement->execute([$_GET['id']]);
$prod=$recipesStatement->fetchall();


?>


<html>
    <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <div class="sidebar">
        <div class="title">
            <h2><span class="fa fa-user-o"></span>LUNOS</h2>
        </div>

        <div class="navbar">
            <ul>
            <li><a class="cl" href="" >Gestion Events</a></li>
         </ul>        
        </div>
    </div>

                    
    <div class="table">
        
        <br><br><br>
        <center><h1>Modifier</h1></center>
        
        <form name="f1"  method="post" action="Modifiere.php" enctype="multipart/form-data" onSubmit="return verif()">
        <center><legend><h2> 
<?php
foreach ($prod as $res) {
 
//}
?>

        </h2></legend></center>
        <table id="example1" class="table table-striped">
        <tr>
          <input type="hidden" name="id"  value="<?php echo $res['id'] ?>">
             
          <th> Nom</th>
          
             <th><input type="text" name="nom" value="<?php  echo $res['nom']; ?>"/></th>
        </tr>
        <th>date</th>
          <th><input type="date" name="date" value="<?php  echo $res['date']; ?>"/></th>
         <tr>
          <?php } ?>
        </tr>
        </table>
        <br>
        <center>
        <td><button type="submit" name="Modifier" value="Modifier" class="btn btn-danger">Modifier</button></td>
      </center>
      </form>
                                    

    </div>
        
    
        <div class="nav">
                    <input type="checkbox">
                        <span></span>
                        <span></span>
                        <div class="menu">
                            <li>
                                
                                <a href="ADD/index.php">Ajouter un Event</a>
                                
                            </li>
                            <li>
                                
                                <a href="GRAPH/index.php">GRAPHS</a>
                                
                            </li>
                        </div>
        </div>  
        
        


        <div class="backbu">
                <a href="../../../WEB/back/Views/BACKFRONT/index.php" class="btn">
                    <span class="text">Text</span>
                    <span class="flip-front">Go Back</span>
                    <span class="flip-back">Back</span>
                </a>
        </div>



    </body>
</html>
