<?php
  include "../userAction.php";
  $clicked_login_id=$_GET["id"];
  $clickedUser = $user->getClickedUser($clicked_login_id);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $clickedUser["name"] ?>のプロフィール</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/shards.min.css?v=3.0.0">
  <link rel="stylesheet" href="../css/shards-demo.min.css?v=3.0.0">
  <script src="https://kit.fontawesome.com/b919d7d2ee.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
    include "header.php";
  ?>
  <div class="container mt-4">
    <div class="card w-75 mx-auto">
      <div class="card-body">
        <div class="row w-75">
          <div class="col-md-3">
            <img src='../upload/<?php echo $clickedUser["picture"] ?>' class='img-fluid rounded-circle'>
          </div>
          <div class="col-md-9">
            <p>
              <strong style="font-size:30px;"><?php echo $clickedUser["name"] ?></strong>
              <?php
                $user_id=$_GET["id"];
                if($user_id!=$login_id):
              ?>
                  <a href="message.php?id=<?php echo $user_id; ?>" class="nav-link text-dark" style="display: inline-block;"><i class="far fa-envelope"></i></a>
              <?php
                endif;
              ?>

              <?php echo $clickedUser["gender"] ?>
              &nbsp;
              <?php echo $clickedUser["status"] ?>
            </p>
            <p>
              <?php echo $clickedUser["bio"] ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include "footer.php";
?>