<?php
  $to="walid.jlassi@esprit.tn";
  $subject ="Password";
  $message ="Your password Is";
  $header ="From: lunos7605@gmail.com";

if (isset($_POST["pass"]))
{
  if ( mail($to , $subject , $message , $header))
  {
    mail($to , $subject , $message , $header);
    echo '<p>Your message has been sent!</p>';
  }
  else
  {
    echo '<p>Something went wrong, go back and try again!</p>';
  }
}

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>  </title>
    <link rel="stylesheet" type="text/css" href="styles.css" />

</head>	
<body>

<div class="form-container">
    <form method="POST" class="form-wrap">
        <h2>Forgot Password</h2>
        <div class="form-box">
            <input type="text" placeholder="Enter Email"/>
        </div>
        <div class="form-submit">
            <input type="submit" value="Send" name="pass"/>
        </div>
    </form>
</div>

</body>
</html>	