<?php
  include "../userAction.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>プロフィール編集</title>
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
                EDIT PROFILE
          </h2>
        </div>
        <div class="card-body">
          <div class="container w-50 text-center border">
            <?php
              $result2 = $user->searchSpecificImage($login_id);
              if(!empty($result2["picture"])){
                $image = $result2['picture'];
                echo "<div class='container w-50 mt-4'>
                        <img src='../upload/$image' class='img-fluid rounded-circle' style=''>
                      </div>";
                echo "<form method='post' action='../userAction.php' enctype='multipart/form-data' class='mt-4'>
                <div class='row'>
                  <div class='form-group col-md-8'>
                  <input type='file' name='new_pic' class='form-control '>
                  </div>
                  <div class='form-group col-md-4'>
                    <input type='submit' value='変更' name='editPicture' class='btn btn-success btn-block'>
                  </div>
                </div>
              </form>";
            ?>
            <?php
              }else{ 
            ?>
            <form method="post" action="../userAction.php" enctype="multipart/form-data" class="mt-5">
              <div class="row">
                <div class="form-group col-md-6">
                <input type='file' name="pic" class="form-control ">
                </div>
                <div class="form-group col-md-6">
                  <input type='submit' value='Upload' name='upload' class="btn btn-primary btn-block">
                </div>
              </div>
            </form>
            <?php 
              } 
            ?>
          </div>
          <div class="container mt-5">
            <form action="../userAction.php" method="post">
              <div class="form-row">
              <div class="form-group col-md-6">
                    <label for="">ユーザーネーム</label>
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-user"></i>
                        </span>
                      </span>
                      <input type="text" name="new_name" class="form-control p-2" value="<?php echo $user_detail["name"] ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">学年</label>
                    <div class="input-group">
                      <select name="new_status" id="" class="form-control"required>
                        <option value="<?php echo $user_detail['status'];?>">
                          <?php 
                            echo $user_detail['status'];
                          ?>
                        </option>
                        <option value="中学生">中学生</option>
                        <option value="高校生">高校生</option>
                        <option value="大学生">大学生</option>
                        <option value="他の学校">他の学校</option>
                        <option value="社会人">社会人</option>
                        <option value="その他">その他</option>
                        <option value="秘密">秘密</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="form-group col-md-12">
                    <label for="">目標</label>
                    <div class="input-group">
                      <textarea name="new_bio" id="" cols="30" rows="10" class="form-control"><?php echo $user_detail['bio']; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="form-group col-md-12">
                    <div class="input-group">
                      <button type="submit" name="editProfile" class="form-control btn btn-success form-control text-uppercase">変更点を保存</button>
                    </div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="form-group ml-auto mr-2">
                    <div class="input-group ">
                      <a href="passwordEdit.php" class="text-danger">メールアドレス/パスワードの変更→</a>
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