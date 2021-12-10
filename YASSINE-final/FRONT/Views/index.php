<?php
    include 'C:\xampp\htdocs\YASSINE\FRONT\Controller\ClientC.php';
    $Forums=new ForumC();
	$listeForums=$Forums->getAllForums(); 

    if (isset($_POST['submit']))
    {
        //$NouvAd = new Forum($_POST['comment'] );
        $last_id = $Forums->ajouterAnswers(array("content" => $_POST["new-comment"], "userId" => 117, "forumId" => $_POST["forumId"]));
       
        $cookie_name = "id";
        $cookie_value = $last_id;
        setcookie($cookie_name, $cookie_value, strtotime( '+30 days' ),"/",'localhost');
        header("Location:index.php");        
    }


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
<form method="POST">
  <div class="hero-text">
    <h1 style="font-size:50px">Welcome to the forum!</h1>
    <p>Where questions are answered.</p>
  </div>
</div>
<button class="add-info" type="submit">
       <a href="ajouter/index.php"> add your question</a>
    </button>
    <br><br>
<!--Display posts table-->
<!--Topic Section-->
<table border="0" align="left">

<?php
    foreach($listeForums as $forums){
      $comments = $Forums->getCommentsOfOneForum(array("id" => $forums["id"]));
?>
<div class="topic-container">
    <!--Original thread-->
    <div class="head">
        <div class="authors">Author</div>
        <div class="content">Topic: random topic (Read 1325 Times)</div>
    </div>

    <div class="body">
        <div class="authors">
            <div class="username"><a href=""><?=$forums["Nom"]?></a></div>
            <div>Role</div>
            <img src=# alt="">
            <div><?=$forums["totalComments"]?> Comments
            <ul>
            <?php 
              foreach($comments as $comment) {
            ?>
              <li><?=  $comment["content"]?></li>
            <?php } ?>
            </ul></div>
            <div>Posts: </div>
            <div>Points: </div>
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
<form class="comment-area hide" id="comment-area" method="post">
    <textarea name="new-comment" name="comment" id="comment" placeholder="Type your text..." cols="100" rows="10"></textarea>
    <input type="hidden" name="forumId" value="<?= $forums["id"]?>">
    <div class="comment"> 
      <button type="submit" name="submit" class="but">
        <a  href="index.php" class="cta">
            <span>Reply</span>
            <svg width="13px" height="10px" viewBox="0 0 13 10">
              <path d="M1,5 L11,5"></path>
              <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
          </a>
              </button>
         
      
    </div>
              </form>
        <?php
			}
		?>
</table>

</form> 

</div>

</body>
</html>