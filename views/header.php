<?php
include "../userAction.php";
$login_id=$_SESSION["login_id"];
$user_detail = $user->getSpecificUser($login_id);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/shards.min.css?v=3.0.0">
    <link rel="stylesheet" href="../css/shards-demo.min.css?v=3.0.0">
    <script src="https://kit.fontawesome.com/b919d7d2ee.js" crossorigin="anonymous"></script>
    
  </head>
  <body>
    <!-- <div class="container-fluid bg-success"> -->
      <nav class="navbar navbar-expand-lg navbar-light  mb-4" style="background-color:rgba(106, 180, 237,0.9);">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a href="home.php" class="nav-link text-dark">ロゴ</a>
          </li>
          <li class="nav-item dropdown">
            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Menu
              <span class="caret"></span>
            </button>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="wordbank.php">Word Bank</a>
              <a class="dropdown-item" href="subject.php">Subject</a>
              <a class="dropdown-item" href="todo.php">ToDo</a>
              <!-- <a class="dropdown-item" href="#">Marketing</a> -->
            </div>
          </li>
          
        </ul>
        <ul class="nav navbar-nav ml-auto navbar-right">
          <!-- <li class="nav-item">
            <a href="category.php" class="nav-link "><i class="far fa-bell"></i></a>
          </li> -->
          <li class="nav-item">
          <form action="">
            <a href="messages.php" class="nav-link "><i class="far fa-envelope"></i></a></form>
          </li>
          <li class="nav-item">
            <a href='profile.php?id=<?php echo $login_id ?>' class="nav-link ">My Page 
              <?php 
                // include "../userAction.php";
                // $id=$_SESSION["login_id"];
                // $userlist = $user->getSpecificUser($id);
                // echo $userlist['name']; 
              ?>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://designrevision.com" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <img src='../upload/<?php echo $user_detail["picture"] ?>' class='img-fluid rounded-circle' style="height:23px;">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="profileEdit.php">Edit Profile</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
              <!-- <a class="dropdown-item" href="#">Marketing</a> -->
            </div>
          </li>
          <li class="nav-item">
            <a href="wordbank.php" class="btn btn-primary text-light" >My Wordbank</a>
          </li>
          <!-- <li class="nav-item">
            <a href="logout.php" class="nav-link text-light"><i class="fas fa-user-alt-slash"></i>Logout</a>
          </li> -->
        </ul>
      </nav>
    <!-- </div> -->
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