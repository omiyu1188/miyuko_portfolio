<?php
  include "../messageAction.php";
  include "../userAction.php";
  $sender_id=$_SESSION["login_id"];
  $login_id = $_SESSION["login_id"];
  $users=$user->getSpecificUser($login_id);
  $messages=$message->getMessages($sender_id);
  // print_r($messages);
  echo $users["name"];
  
  // echo "<pre>";
  // print_r($messages);
  // echo "</pre>";
  // foreach($messages as $message){
  //   // $text=$message["text"];
  //   echo $name;
  //   echo "<br>";
  //   echo $text;
  // }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sign Up</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/shards.min.css?v=3.0.0">
  <link rel="stylesheet" href="../css/shards-demo.min.css?v=3.0.0">
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
      <!-- <div class="row"> -->
        <a role="button" href="message.php?id=
        <?php 
        // if($users_send_id==$sender_id){
          echo $users["ahaha"];
        // }elseif($users_send_id==$receiver_id){
          // echo $receiver_id;
        // }
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
      <!-- </div> -->
      <?php
          }
        }
      ?>
      <div class="row">
        <?php
          // if($receive == $receiver_id){
          //   echo "<div class='col-6'></div><div class='col-6 alert mb-4 alert-primary w-50' role='alert' style='display:inline-block;'>.$text.</div>";
          // }else{
          //   echo "<div class='col-6 alert mb-4 alert-light' role='alert' style=' '>.$text.</div><div class='col-6'></div>";
          // }
        ?>
      </div>
      <?php 
    // }
     ?>
    </div>
  </div>
  


  </div>

  <!-- JavaScript -->
  <div id="fb-root"></div>
  <script>
    (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1662270373824826";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/shards.min.js"></script>
  <script src="js/demo.min.js"></script>

</body>

</html>
