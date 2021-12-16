<?php
	include 'C:\xampp\htdocs\EYA\front\Controller\ClientC.php';	
	$db=config::getConnexion();
$sql="SELECT * FROM events where enable like 0";
$recipesStatement = $db->prepare($sql);
$recipesStatement->execute();
$listeEvent=$recipesStatement->fetchall();
?>
<!doctype html> 
<html>
    <head>
        <title> Events </title>
            <link rel="stylesheet" type ="text/css" href="style.css">
    </head>
    <body>
        <section>
            <div class="leftbox">
                <div class="content">
                    <h1>Events And Shows </h1>
                    <p>L'astrologie est un ensemble de croyances et de pratique fondées sur l'interprétation symbolique des correspondances supposées entre les configurations célestes et les affaires humaines, collectives ou individuelles. Ici, nous avons une présentation de tous les évènements mensuels.</p>
                    <button class="btn btn-primary" onclick="print('index.php')">







                        <div class="letter-image">
                            <div class="animated-mail">
                                <div class="back-fold"></div>
                                <div class="letter">
                                    <div class="letter-border"></div>
                                    <div class="letter-title"></div>
                                    <div class="letter-context"></div>
                                    <div class="letter-stamp">
                                        <div class="letter-stamp-inner"></div>
                                    </div>
                                </div>
                                <div class="top-fold"></div>
                                <div class="body"></div>
                                <div class="left-fold"></div>
                            </div>
                            <div class="shadow"></div>
                        </div>





                
                    </button>
                </div>
            </div>
            <div class="table">
            <div class="events">
		<table border="1" align="right" class="container">
			<tr>
			</tr>
			<?php
				foreach($listeEvent as $events){
			?>
			<tr>

           
            <td><h1><?php echo $events['description']; ?></h1></td>

            
            <td><h1><?php echo $events['nom']; ?></h1>
            
            <br>
            <h1><?php echo $events['date']; ?></h1>
 <form method="post" action="../../../back/Views/ADD/Ajouterpart.php">
<input type="submit" value="Participer" class="btn btn-danger">


<input type="hidden" value="<?php echo $events['id'] ?>" name="id">
</form>
            </td>
			</tr>
            
			<?php
				}
			?>
		</table>
   
	</div>

    <a href="../../../../WEB/Site/View/FrontPageAbonnee/index.php">
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
         </section>
         
         <script>
   function print(pdf)
       {
                    // Créer un IFrame.
        var iframe = document.createElement('iframe');  
        // Cacher le IFrame.    
        iframe.style.visibility = "hidden"; 
        // Définir la source.    
        iframe.src = pdf;        
        // Ajouter le IFrame sur la page Web.    
        document.body.appendChild(iframe);  
        iframe.contentWindow.focus();       
        iframe.contentWindow.print(); // Imprimer.
             }
</script>

        
	
	


    </body>
</html>

    