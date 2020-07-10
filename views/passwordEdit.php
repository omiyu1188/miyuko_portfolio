<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>パスワード変更</title>
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
<div class="container">
      <div class="card mx-auto w-75 my-5 border border-0">
        <div class="card-header bg-white text-dark border-0">
          <h2 class="text-center pt-5">
                メールアドレス/パスワードの変更
          </h2>
        </div>
        <div class="card-body pt-0">
          <div class="container mt-5">
            <form action="../userAction.php" method="post">
              <div class="form-row">
              <div class="form-group col-md-6">
                    <label for="">メールアドレス</label>
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
                    <label for="">パスワード</label>
                    <div class="input-group">
                      <input type="password" name="new_password" id="" cols="30" rows="10" class="form-control">
                      <input type="hidden" name="old_password" value="<?php echo $user_detail['password']; ?>">
                    </div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="form-group col-md-12">
                    <div class="input-group">
                      <button type="submit" name="editPassword" class="form-control btn btn-primary form-control text-uppercase">変更する</button>
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
  </div>


<?php
include "footer.php";
?>