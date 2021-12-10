<?php
    include '../../Controller/ClientC.php';
    if(isset($_POST["submit"]))
    {   
        if (!empty($_POST["name"]) && $_POST['Lastname'] && $_POST['email'] && $_POST['phone'] && $_POST['pass'])
        {  
            $image = $_FILES["image"];
            $imageDir = $image["tmp_name"];
            $imageName = $image["name"];
            $imageType = $image["type"];
            $data = file_get_contents($imageDir);
            $a=new ClientC();
            //MAIL NOT EXISTED
            $user = $a->verifyEmailClient($_POST['email']);
            if ($user != true)
            {
              $NouvAd = new Client($_POST['name'] , $_POST['Lastname'] ,$_POST['email'] , $_POST['phone'] ,$_POST['pass'], $_POST['gender']);
              $last_id = $a->ajouterclient($NouvAd);
              $a->insertImage(array("imageData" => $data, "imageType" => $imageType, "userId" => $last_id));
              $cookie_name = "id";
              $cookie_value = $last_id;
              setcookie($cookie_name, $cookie_value, strtotime( '+30 days' ),"/",'localhost');
              header("Location:../FrontPageAbonnee/index.php");
            }
            else
            {
              echo '<script>alert("EMAIL EXIST") </script>';
            }
        }
        //INPUT MISSING
        else
        {
            echo '<script>alert("SOMETHING MISSING")</script>';
        }   
      }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@200&display=swap');
  </style>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <title>registration</title>

<body>
  <div class="split-screen">
    <div class="left">
      <section class="copy">
        <h1>Be part of our galaxy</h1>
        <h6>join our community</h6>
      </section>
    </div>

    <div class="right">
      <form method = "POST" enctype='multipart/form-data' onsubmit="return VerifAllOfThem()" >
        <section class="copy">
          <h2>Sign up</h2>
          <div class="login-cont">
            <p>already part of us <a href="../NEWLOGIN/index.php">
                Click to login</a></p>
          </div>
        </section>
        <div class="input-cont-name">
          <label for="name">Fisrt Name</label>
          <input type="text" id="name" placeholder="Enter your first name" name="name">
        </div>
        <div class="input-cont-lastname">
          <label for="Lastname">Last name</label>
          <input type="text" id="lastname" placeholder="Enter your first Last name" name="Lastname">
        </div>
        <div class="input-cont-email">
          <label for="name">Email</label>
          <input type="email" id="email" name="email" placeholder="enter your email">
        </div>
        <div class="input-cont-age">
          <label for="name">Phone</label>
          <input type="text" id="phone" placeholder="Enter your age" name="phone">
        </div>
        <div class="input-cont-password">
          <label for="name">Password</label>
          <input type="password" id="password" placeholder="Enter your password" name="pass">
          <i class="fa fa-eye-slah"></i>
        </div>
        <div class="input-cont-confr">
          <label for="name">Password Confirmation</label>
          <input type="password" id="password1" name="password1" placeholder="Re-enter your password" name="pass1">
          <i class="fa fa-eye-slah"></i>
        </div>
        <div class="input-cont-confr">
          <select name="gender" id="">
          <option value="None" selected disabled>Select Gender</option>
            <option value="M">M</option>
            <option value="F">F</option>
          </select>
          <i class="fa fa-eye-slah"></i>
        </div>
        <br>
        <div class="upload">
          <label>Upload Here</label>
          <input type="file" name="image" required>
        </div>
        I accept the terms of the <a href="#">
          policy </a>and conditions.
        <br>
        <br>
         <button class="signup-btn" type="submit" name="submit">
           Sign up 
         </button>
      </form>
    </div>
  </div>
  <script src="index.js" type="text/javascript"></script>
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>

</html>

