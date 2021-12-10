<?php
include '../../Controller/ClientC.php';
if(isset($_POST["submit"]))
{
$a=new ClientC();
$user = $a->verifyUser($_POST['email'] ,$_POST['pass']);
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
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Client</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
  <div class="LOGO_NAVBAR">
        <div class="logo">
            <img src="Images/lunos.png">
        </div>
        <div class="nav_bar">
            <ul>
                <li> <a href="../FrontPageClient/index.php" class="home" alt="">Home</a></li>
                <li> <a href="second page/index.html" alt="">Our Planet</a></li>
                <li> <a href="../Login/index.php" class="login"alt="">Login</a></li>
            </ul>
        </div>
    </div>

    <div class="center">
      <h1>Login Client</h1>
      <form method="POST">
        <div class="txt_field">
          <input name="email" type="text" >
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input name="pass" type="password" >
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" value="Login" name="submit">
        <div class="signup_link">
          Not a member? <a href="../Registration/index.php">Signup</a>
        </div>
        <a href="../ForgetPass/index.php">Forget your password ?</a>
      </form>
      <!------------------- BUTTON -------------------->
      <div class="Butt">
      <a href="../LoginAdmin/index.php" class="animated-button1">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Admin ?
     </a>
      </div>
  
    <!------------------------------------------------->
    </div>
  </body>
</html>
