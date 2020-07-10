<?php
  include "../messageAction.php";
  $receiver_id=$_GET["id"];
  $sender_id=$_SESSION["login_id"];
  $messages=$message->getMessage($receiver_id,$sender_id);
  include "../userAction.php";
  $clicked_login_id=$receiver_id;
  $users=$user->getClickedUser($clicked_login_id);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>DM</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/shards.min.css?v=3.0.0">
  <link rel="stylesheet" href="../css/shards-demo.min.css?v=3.0.0">
  <script src="https://kit.fontawesome.com/b919d7d2ee.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
<?php
    include "header.php";
  ?>
  <div class="container">
  <div class="card w-75 mx-auto mt-5">
    <div class="card-header">
    <img src='../upload/
      <?php 
          echo $users["picture"];
      ?>' 
    class='img-fluid rounded-circle' style='width:25px;'> <?php echo $users["name"]; ?>
    </div>
    <div class="card-body">
      <?php
        foreach((array)$messages as $message){
          $text=$message["text"];
          $receive=$message["receiver_id"];
      ?>
      <div class="row">
        <?php
          if($receive == $receiver_id){
            echo "<div class='col-6'></div><div class='col-6 alert mb-4 alert-primary w-50' role='alert' style='display:inline-block;'>$text</div>";
          }else{
            echo "<div class='col-6 alert mb-4 alert-light' role='alert' style=' '>$text</div><div class='col-6'></div>";
          }
        ?>
      </div>
      <?php } ?>
    </div>
    <div class="card-footer text-muted">
      <form action="" method="post">
        <div class="form-row">
          <div class="form-group col-10">
            <input type="text" class="form-control" name="text">
          </div>
          <div class="form-group col-2">
            <input type="submit" class="form-control btn btn-outline-primary" name="addMessage">
          </div>
        </div>
      </form>
    </div>
  </div>
  


  </div>

<?php
include "footer.php";
?>