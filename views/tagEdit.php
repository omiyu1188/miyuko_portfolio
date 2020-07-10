<?php
  include "../tagAction.php";
  $id=$_GET["id"];
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>カテゴリー編集</title>
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
    $tag_detail = $tag->getSpecificTag($id,$login_id);
  ?>
  <div class="container">
    <div class="container">

    </div>
    <div class="row mt-5">
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
              foreach($taglist as $tag){
                $tagID=$tag["id"];
                
                echo "
                <tr>
                <td>".$tagID."</td>
                <td>".$tag['tag_name']."</td>
                <td>
                <form method='post' style='display:inline-block;'>
                <a href='tagEdit.php?id=$tagID' type='submit' role='button' name='editTag' class='btn btn-outline-warning mr-3' type='submit'>Edit</a>
                </form>
                <a href='deleteTag.php?id=$tagID' role='button' name='delete' class='btn btn-outline-danger'>Delete</a></td>
                </tr>
                ";
              }
              ?>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <div class="card mx-auto border border-0">
          <div class="card-header bg-white text-dark border-0">
            <h2 class="text-center pt-5">
              カテゴリー編集
            </h2>
          </div>
          <div class="card-body">
            <?php
                  foreach($tag_detail as $detail){
                    echo '
                    <form action="" method="post">
                    <div class="form-row">
                      <div class="form-group col-md-12 mt-3">
                        <input type="text" class="p-3 form-control" placeholder="'.$detail["tag_name"].'" name="new_name">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12 mt-3">
                        <input type="hidden" name="tag_id" value="'.$detail["id"].'">
                        <input type="hidden" name="old_name" value="'.$detail["tag_name"].'">
                        <input type="submit" class="btn btn-outline-success p-3 form-control" name="updateTag" value="変更">
                      </div>
                    </div>
                    </form>
                   ';
                  }
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include "footer.php";
  ?>
