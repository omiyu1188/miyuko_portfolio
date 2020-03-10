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
<body class="bg-light" style="background-image:url(../image/index-background.png);">
<div class="container">
        <div class="card mx-auto w-50 my-5 border border-0">
          <div class="card-header bg-white text-dark border-0">
            <h2 class="text-center mt-5">
              SIGN UP
            </h2>
          </div>
          <div class="card-body">
            <form action="../userAction.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="">Username</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-user"></i>
                      </span>
                    </span>
                    <input type="text" name="name" class="form-control p-2"  placeholder="ENTER YOUR USERNAME"required>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Gender</label>
                  <div class="input-group">
                    <!-- <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                      </span>
                    </span> -->
                    <select name="gender" id="" class="form-control"required>
                      <!-- <option value="" disabled>Select your gender</option> -->
                      <option hidden>CHOOSE YOUR GENDER</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="others">Others</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Status</label>
                  <div class="input-group">
                    <!-- <span class="input-group-prepend"> -->
                      <!-- <span class="input-group-text"> -->
                        <!-- <i class="fa fa-lock"></i> -->
                      <!-- </span> -->
                    <!-- </span> -->
                    <select name="status" id="" class="form-control"required>
                      <option hidden>CHOOSE YOUR STATUS</option>
                      <option value="junior">Junior High School Student</option>
                      <option value="high">High School Student</option>
                      <option value="university">University Student</option>
                      <option value="students">Student of other school</option>
                      <option value="worker">Worker</option>
                      <option value="others">None of the above</option>
                      <option value="secret">Secret</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="">Email</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-envelope" style="margin:0 -2.3px;"></i>
                      </span>
                    </span>
                    <input type="text" name="email" class="form-control p-2"  placeholder="ENTER YOUR EMAIL"required>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="">Password</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                      </span>
                    </span>
                      <input type="password" name="password" class="form-control p-2" placeholder="ENTER YOUR PASSWORD" required>
                  </div>
                </div>
              </div>
              <div class="form-row mt-3">
                <div class="form-group col-md-12">
                  <div class="input-group">
                     <button type="submit" name="signup" class="form-control btn btn-danger form-control text-uppercase">SIGN UP</button>
                  </div>
                </div>
              </div>
              <div class="form-row mt-3">
                <div class="form-group ml-auto mr-2">
                  <div class="input-group">
                     <a href="login.php" role="button" class="text-primary">LOGIN NOW</a>
                  </div>
                </div>
              </div>
            </form>
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
