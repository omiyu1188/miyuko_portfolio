<?php
  // include "../userAction.php";
  // $login_id=$_SESSION["login_id"];
  // $user_detail = $user->getSpecificUser($login_id);
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
<body>
<?php
    include "header.php";
  ?>
<div class="container">
      <div class="card mx-auto w-75 my-5 border border-0">
        <div class="card-header bg-white text-dark border-0">
          <h2 class="text-center pt-5">
                EDIT EMAIL / PASSWORD
          </h2>
        </div>
        <div class="card-body">
          <div class="container mt-5">
            <form action="../userAction.php" method="post">
              <div class="form-row">
              <div class="form-group col-md-6">
                    <label for="">Email Address</label>
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-user"></i>
                        </span>
                      </span>
                      <input type="text" name="new_email" class="form-control p-2" value="<?php echo $user_detail["email"] ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Password</label>
                    <div class="input-group">
                      <input type="password" name="new_password" id="" cols="30" rows="10" class="form-control">
                      <input type="hidden" name="old_password" value="<?php echo $user_detail['password']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="form-group col-md-12">
                    <div class="input-group">
                      <button type="submit" name="editPassword" class="form-control btn btn-primary form-control text-uppercase">SAVE</button>
                    </div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="form-group ml-auto mr-2">
                    <div class="input-group ">
                      <a href="" class="text-danger">ahaha→</a>
                    </div>
                  </div>
                </div>
            </form>
          </div>
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
