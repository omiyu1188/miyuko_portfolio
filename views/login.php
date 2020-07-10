<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login</title>
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
             ログイン
            </h2>
          </div>
          <div class="card-body">
            <form action="../userAction.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="">メールアドレス</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                       <i class="fa fa-envelope" style="margin:0 -2.3px;"></i>
                      </span>
                    </span>
                    <input type="text" name="email" class="form-control p-2"  placeholder="EMAIL">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="">パスワード</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                      </span>
                    </span>
                      <input type="password" name="password" class="form-control p-2" placeholder="PASSWORD">
                  </div>
                </div>
              </div>
              <div class="form-row mt-3">
                <div class="form-group col-md-12">
                  <div class="input-group">
                     <button type="submit" name="login" class="form-control btn btn-info form-control text-uppercase">ログイン</button>
                  </div>
                </div>
              </div>
              <div class="form-row mt-3">

                <div class="form-group ml-auto mr-2">
                  <div class="input-group">
                     <a href="signup.php" role="button" class="text-primary">REGISTER NOW</a>
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
  <script src="../js/shards.min.js"></script>
  <script src="../js/demo.min.js"></script>

</body>

</html>
