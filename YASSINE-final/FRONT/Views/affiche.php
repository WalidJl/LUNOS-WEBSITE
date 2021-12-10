<?php
    include 'C:\xampp\htdocs\YASSINE\FRONT\Controller\ClientC.php';
    $Forums=new ForumC();
	$listeForums=$Forums->afficherForum(); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("space.jpg");
            height: 20%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .hero-text {
            text-align: justify;
            position: absolute;
            top: 40%;
            left: 20%;
            transform: translate(-50%, -50%);
            color: white;
        }
    </style>
</head>

<body>

    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:50px">Welcome to the forum!</h1>
            <p>Where questions are answered.</p>
        </div>
    </div>
    
    <table border="0" align="left">
    <div class="container">
            
        <div class="subforum">
            
            <tr>

                    <div class="subforum-title">
                        <h1>General Information</h1>
                    </div>

            </tr>
            <?php
				foreach($listeForums as $forums){
			?>
            <tr>
                <td>
                                <div class="subforum-row">
                                    <div class="subforum-icon subforum-column center">
                                        <i class="fa fa-car center"></i>
                                    </div>
                </td>

                <td>
                            <div class="subforum-description subforum-column">
                                 
                                <h4> <p><a href="comment.php"><?php echo $forums['Question']; ?></p></a></h4>
                            </div>
                </td>

                <td>

                <div class="subforum-stats subforum-column center">
                    <span>24 answers</span>
                </div>

                 </td>

                 <td>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a>
                    <br>on <small>12 Dec 2020</small>
                </div>
            </td>
            </div>
        </tr>
        </div>

        
    </div>
            <?php
				}
			?>
    </table>
    <script src="main.js"></script>
</body>

</body>

</html>