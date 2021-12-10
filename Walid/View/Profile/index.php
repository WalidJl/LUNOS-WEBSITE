<?php
include '../../Controller/ClientC.php';
$a=new ClientC();
$numAd = $_COOKIE["id"];
//chercher le client dans bd
$utilisateur = $a->getUserById($numAd);
/**************************IMAGE****************************/
$userImage = $a->getImageOfUser(array("id" => $numAd));
$imageData = $userImage["imageData"];
$base64Encoded = base64_encode($imageData);
$imageHtml = "<img id='user-image' class='profile-pic' src='data:image/jpeg;base64, $base64Encoded'/>";
/**********************************************************/
//modifier
if(isset($_POST["submit"]))
{
    $a->ModifierClient( $numAd, $_POST['nom'] ,$_POST['prenom'] ,$_POST['email'], $_POST['phonenumber'],$_POST['password']);
    $image = $_FILES['image'];
    var_dump($image);
    if ($image['size'] != 0)
    {
    $imageDir = $image["tmp_name"];
    $imageName = $image["name"];
    $imageType = $image["type"];
    $data = file_get_contents($imageDir);
    $a->changeImage(array("userId" => $numAd, "imageData" => $data, "imageType" => $imageType));
    }
    header("Location: ../Profile/index.php");
}

if(isset($_POST["logout"]))
{
    header("Location: ../FrontPageClient/index.php");
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <title>Profile</title>
  </head>
  <body>
  <div class="LOGO_NAVBAR">
        <div class="logo">
            <img src="Images/lunos.png">
        </div>
        <div class="nav_bar">
            <ul>
                <li> <a href="../FrontPageAbonnee/index.php" class="home" alt="">Home</a></li>
                <li> <a href="../FrontPageClient/PLANETView/index.php" alt="">Our Planet</a></li>
                <li> <a href="#" alt="">Events</a></li>
                <li> <a href="#" alt="">Products</a></li>
                <li> <a href="../Profile/index.php" class="profile" alt="">Profile</a></li>
            </ul>
        </div>
    </div>
  
  <form method="POST" enctype="multipart/form-data" onsubmit="return VerifAllOfThem()">

<div class="box">
    <h1>Welcome To Your Profile</h1>
    <?= $imageHtml ?>
    <input id="image" name="image" type="file" onchange="previewImage(event)" >

  <h2>Personal Info</h2>
    <div class="user_details">

<div class="output_box">
     <span class="NAME">Name:</span>
    <input id="name" type="text" name="nom" value= "<?= $utilisateur['Nom']; ?>" />
 </div>


<div class="output_box">
    <span class="NAME">Surname:</label>
    <input id="lastname" type="text" name="prenom" value="<?= $utilisateur['Prenom']; ?>"/>
</div>

 <div class="output_box">
    <label class="NAME">Email:</label>
    <input type="email" name="email" value="<?= $utilisateur['Email'];?> "/>
 </div>

<div class="output_box">
    <span class="NAME">Phone:</label>
    <input id="phone" type="text" name="phonenumber" value="<?= $utilisateur['Phone'];?> "/>
 </div>

<div class="output_box">
    <span class="NAME">Password:</label>
    <input id="password" type="password" name="password" value="<?= $utilisateur['Password'];?> "/>
 </div>


</div>  

<div class="button">
<input type="submit" value="Update" name="submit">
</div>

<div class="button">
<input  type="submit" value="logout" name="logout">
</div>

            
</div>
</div>
</form>

<script src="index.js" type="text/javascript"></script>
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>
</html>

