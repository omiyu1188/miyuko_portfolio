<?php
include "../subjectAction.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>科目/教材の編集</title>
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
    $subject_id=$_GET["id"];
    $subject_detail = $subject->getSpecificSubject($subject_id,$login_id);
  ?>
  <div class="container-fluid mt-5 w-50">
    <div class="row">
      <div class="col-12">
        <?php
          echo '
          <form action="" method="post">
          <label for="">Task</label>
          <div class="form-row">
            <div class="form-group col-md-10">
              <input type="text" class="form-control" placeholder="'.$subject_detail["subject_name"].'" name="new_name">
            </div>

            <div class="form-group col-md-2">
              <input type="hidden" name="subject_id" value="'.$subject_detail["subject_id"].'">
              <input type="hidden" name="old_name" value="'.$subject_detail["subject_name"].'">
              <input type="submit" class="btn btn-outline-success  form-control" name="updateSubject" value="SAVE">
            </div>
          </div>
          </form>
          ';
        ?>
      </div>
    </div>
  </div>
  <?php
  include "footer.php";
  ?>