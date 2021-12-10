<?php
  include "../controller/controller.php";
  session_start();
  $_SESSION["userId"] = 4;
  $controller = new Controller();
  $contacts = $controller->getUsers(array("userId" => $_SESSION["userId"]));
  $html = "";
  foreach($contacts as $contact) {
    $contactName = $contact["name"];
    $contactId = $contact["id"];
    $html .= "<li><a href='chatBox.php?recv=$contactId'>$contactName</a></li>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <ul>
    <?= $html ?>
  </ul>
</body>
</html>