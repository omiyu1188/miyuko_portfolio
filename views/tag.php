<?php
  include "../tagAction.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>カテゴリー</title>
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
    <div class="container p-0">
      <a href="wordbank.php" class="btn btn-outline-secondary"> < Wordbankに戻る</a>
    </div>
    <div class="row mt-4">
      <div class="col-6">
        <table class="table table-striped table-bordered">
          <thead class="bg-dark text-white">
            <th>No.</th>
            <th>Name</th>
            <th></th>
          </thead>
          <tbody>
            <?php
              $login_id=$_SESSION["login_id"];
              $taglist=$tag->getTags($login_id);
              if(empty($taglist)){
              }else{
                foreach($taglist as $tag){
                  $tagID=$tag["id"];
                  
                  echo "
                  <tr>
                  <td>".$tagID."</td>
                  <td>".$tag['tag_name']."</td>
                  <td>
                 
                  <a href='tagEdit.php?id=$tagID' role='button' name='editTag' class='btn btn-outline-warning mr-3'>編集</a>
  
                  <a href='tagDelete.php?id=$tagID' role='button' name='delete' class='btn btn-outline-danger'>消去</a></td>
                  </tr>
                  ";
                }
              }
              ?>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <div class="card mx-auto border border-0">
          <div class="card-header bg-white text-dark border-0">
            <h2 class="text-center pt-5">
              カテゴリー登録
            </h2>
          </div>
          <div class="card-body pt-0">
            <form action="" method="post">
              <div class="form-row">
                <div class="form-group col-md-12 mt-3">
                <label for="">（例）日常会話、イディオム、ビジネス英語等</label>
                  <input type="text" class="p-3 form-control" placeholder="追加するカテゴリーを入力してください。" name="name" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12 mt-3">
                  <button type="submit" class="btn btn-outline-danger p-3 form-control"  name="addTag" required>登録</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include "footer.php";
  ?>