<?php
include 'C:\xampp\htdocs\WEB\Site\Controller\ClientC.php';
/********************CLIENT****************** */

if(isset($_POST["submit"]))
{
  /**************************CLIENT*********************/
$a=new ClientC();
$user = $a->verifyUser($_POST['email_client'] ,$_POST['password_client']);
if( $user != false )
{
  $cookie_name = "id";
  $cookie_value = $user["id"];
  setcookie($cookie_name, $cookie_value, strtotime( '+30 days' ),"/",'localhost');
  header("Location:../FrontPageAbonnee/index.php");
}
else 
{
  echo '<script>alert("CREATE AN ACCOUNT !!")</script>';
}
/********************************ADMIN********************** */
$b=new AdminC();
$user1 = $b->verifyAdmin($_POST['email_admin'] ,$_POST['password_admin']);
if ($user1 != false )
{
  $cookie_name = "id";
  $cookie_value = $user["id"];
  setcookie($cookie_name, $cookie_value, strtotime( '+30 days' ),"/",'localhost');
  header("Location:../../../back/Views/BACKFRONT/index.php");
}
else 
{           
   echo '<script>alert("You are not an admin !!")</script>';
}
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="LOGO_NAVBAR">
        <div class="logo">
            <img src="Images/lunos.png">
        </div>
        <div class="nav_bar">
            <ul>
                <li> <a href="../FrontPageClient/index.php" class="home" alt="">Home</a></li>
                <li> <a href="../FrontPageClient/PLANETView/index.php" alt="">Our Planet</a></li>
                <li> <a href="../Login/index.php" class="login"alt="">Login</a></li>
            </ul>
        </div>
    </div>
<p class="tip"></p>
<br><br><br>
<div class="cont">
  <form method="POST">
      <div class="form sign-in">
        <h2>Welcome back,</h2>
        <label>
          <span>Email</span>
          <input type="email" name="email_client"/>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password_client" />
        </label>
        <a href="../ForgetPass/index.php">
        <p class="forgot-pass">Forgot password?</p>
        </a>
            <button class="signup-btn" type="submit" name="submit">
            <div class="r">Sign Up</div>
            <div class="button__horizontal"></div>
            <div class="button__vertical"></div>
          </button>        
        <br>
        <a href="../Registration/index.php">
          <button type="button" class="fb-btn">New here ? Create an account</button>
        </a>

      </div>
      <div class="sub-cont">
        <div class="img">
          <div class="img__text m--up">
            <h2>Client here?</h2>
            <p>Sign up and discover great amount of new opportunities!</p>
          </div>
          <div class="img__text m--in">
            <h2>One of our crew?</h2>
            <p> just sign in. We've missed you!</p>
          </div>
          <div class="img__btn">
            <span class="m--up">Admin</span>
            <span class="m--in">Client</span>
          </div>
        </div>
        <div class="form sign-up">
          <h2>Time to feel like home,</h2>
          <label>
            <span>Email</span>
            <input type="email" name="email_admin"/>
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="password_admin"/>
          </label>

          <button class="button" type="submit" type="submit" name="submit">
            Sign Up
            <div class="button__horizontal"></div>
            <div class="button__vertical"></div>
          </button>

         <!--- <button type="button" class="fb-btn">Join with <span>Google</span></button> --->

        </div>
      </div>
 </form>
</div>

<a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a>
<script src="index.js" type="text/javascript"></script>
</body>
</html>