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
body, html {
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
<button class="add-info" type="submit">
       <a href="Ajouter/index.php"> add your question</a>
    </button>
    <br><br>
<!--Display posts table-->
<!--Topic Section-->
<table border="0" align="left">

<?php
		foreach($listeForums as $forums){
?>
<div class="topic-container">
    <!--Original thread-->
    <div class="head">
        <div class="authors">Author</div>
        <div class="content">Topic: random topic (Read 1325 Times)</div>
    </div>

    <div class="body">
        <div class="authors">
            <div class="username"><a href="">Username</a></div>
            <div>Role</div>
            <img src=# alt="">
            <div>Posts: <u></u></div>
            <div>Points: <u></u></div>
        </div>
        <div class="content">
            <h1><?php echo $forums['Question']; ?></h1>
            <br><br>
            <?php echo $forums['Subject']; ?>
            <br><br>
            
            <br>
            <hr>
            Regards username
            <br>
        </div>
    </div>
</div>

<!--Comment Area-->
<div class="comment-area hide" id="comment-area">
    <textarea name="comment" id="" placeholder="Type your text..."></textarea>
    <div class="comment">
        <a href="#" class="cta">
            <span>Reply</span>
            <svg width="13px" height="10px" viewBox="0 0 13 10">
              <path d="M1,5 L11,5"></path>
              <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
          </a>
    </div>
</div>
        <?php
			}
		?>
</table>

   
</div>
</body>
</html>