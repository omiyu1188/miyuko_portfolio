<?php
  include "../messageAction.php";
  include "../userAction.php";
  $sender_id=$_SESSION["login_id"];
  $login_id = $_SESSION["login_id"];
  $users=$user->getSpecificUser($login_id);
  $messages=$message->getMessages($sender_id);
  echo $users["name"];
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Messages</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/shards.min.css?v=3.0.0">
  <link rel="stylesheet" href="../css/shards-demo.min.css?v=3.0.0">
  <script src="https://kit.fontawesome.com/b919d7d2ee.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
<div class="container">
  <div class="card w-75 mx-auto mt-5">
    <div class="card-body">
      <?php
        foreach($messages as $message){
          $name=$message["name"];
          $users_send_id=$message["sender_id"];
          $users_receive_id=$message["receiver_id"];
          $picture=$message["picture"];
          $text=$message["text"];
          if($name!=$users["name"]){

      ?>
        <a role="button" href="message.php?id=
        <?php 
          echo $users["ahaha"];
        ?>
        " class="btn form-control border mb-3">
          <div class="row text-left">
            <div class="col-md-3"> 
              <?php echo $name ?>
            </div> 
            <div class="col-md-9"> 
              <?php echo $text ?>
            </div> 
          </div>
        </a>
      <?php
          }
        }
      ?>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>