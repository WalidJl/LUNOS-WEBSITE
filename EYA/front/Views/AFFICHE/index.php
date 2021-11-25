<?php
	include 'C:\xampp\htdocs\EYA\front\Controller\ClientC.php';	
	$Events=new EventsC();
	$listeEvents=$Events->afficherEvents(); 
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
                </div>
            </div>
            <div class="table">
            <div class="events">
		<table border="1" align="right" class="container">
			<tr>
			</tr>
			<?php
				foreach($listeEvents as $events){
			?>
			<tr>

           
            <td><h1><?php echo $events['description']; ?></h1></td>

            
            <td><h1><?php echo $events['nom']; ?></h1>
            
            <br>
            <h1><?php echo $events['date']; ?></h1>

            </td>
			</tr>
            
			<?php
				}
			?>
		</table>
	</div>
         </section>
         


        
	
	

    </body>
</html>

    