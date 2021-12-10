<?php
include '../../Controller/ClientC.php';
if(isset($_POST["submit"]))
{
$a=new AdminC();
$user = $a->verifyAdmin($_POST['email'] ,$_POST['pass']);
if( $user != false )
{
  $cookie_name = "id";
  $cookie_value = $user["id"];
  setcookie($cookie_name, $cookie_value, strtotime( '+30 days' ),"/",'localhost');
  header("Location:../../../back/Views/BACKFRONT/index.php");
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
    <link rel="stylesheet" href="style.css">
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
      <h1>Login Admin</h1>
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
          
        </div>
      </form>
      <!--- BUTTON --->
      <div class="Butt">
      <a href="../Login/index.php" class="animated-button1">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  Client ?
</a>
      </div>
  
<!--- BUTTON --->
    </div>
    
  </body>
</html>
