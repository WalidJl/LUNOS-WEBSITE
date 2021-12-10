<?php
  session_start();
  include "../controller/controller.php";
  $controller = new Controller();
  $recvId = (int)$_GET["recv"];
  $msgs = $controller->getMessagesOfUser(array("sender" => $_SESSION["userId"], "recv" => (int)$_GET["recv"]));
  $html = "";
  foreach($msgs as $msg) {
    $content = $msg["content"];
    $user = $msg["name"];
    $html .= "
      <div class='msg'>
        <div class='sender'>$user: </div>
        <div class='msg-content'>$content</div>
      </div>
    ";
  }
  if(isset($_POST["send-msg"])) {
    $msg = $_POST["msg"];
    $controller->sendMessage(array("sender" => $_SESSION["userId"], "recv" => (int)$_GET["recv"], "content" => $msg));
    header("Location: chatBox.php?recv=$recvId");
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  
  <title>Chat Box</title>
</head>
<body>
<div class="container">
  <div class= "intr">
  Chat Box Between user <?= $_SESSION["userId"] ?> and user <?= $_GET["recv"] ?>
  </div>
  <div class="msg-area">
    <div class="msgs">
    <?= $html ?>
    </div>
    <form class="submit-section" method="post">
      <input type="text" name="msg" class="inp-txt" placeholder="enter your text">
      
      <button class="send" name="send-msg" type="submit">
          send 
         </button>
    </form>
    
    <a href="index.php">Back</a>
         
    
  </div>
  </div>
</body>
</html>