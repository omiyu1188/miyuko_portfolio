<?php
include "../subjectAction.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>科目/教材</title>
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
    <div class="container ml-4">
      <a href="home.php" class="btn btn-outline-secondary">ホームに戻る</a>
    </div>
  <div class="container-fluid mt-5 w-50">
    <div class="row">
      <div class="col-12">
      <form action="" method="post">
        <label for="">新しい科目/教材の登録</label>
        <div class="form-row">
          <div class="form-group col-md-10">
            <input type="text" class="p-2 form-control"  name="subject_name" required>
          </div>
          <div class="form-group col-md-2">
            <input type="hidden" name="login_id" value="<?php echo '';?>">
            <button type="submit" class="btn btn-outline-danger form-control"  name="addSubject" required>登録</button>
          </div>
        </div>
      </form>
      </div>
      </div>
</div>
<div class="row w-50 mx-auto">
    <div class="col-12">
    <table class="table table-hover table-striped table-bordered mx-auto my-5 ">
      <tbody>
        <?php
          $login_id=$_SESSION["login_id"];
          $subjectlist=$subject->getSubjects($login_id);
          if(empty($subjectlist)){

          }else{
            foreach($subjectlist as $subject){
              $subjectID=$subject["subject_id"];
              echo "
                <tr>
                  <td>".$subject['subject_name']."</td>
                  <td>"."<a href='subjectEdit.php?id=$subjectID' role='button' class='btn btn-outline-warning mr-4'>"."編集"."</a>
                  <a href='subjectDelete.php?id=$subjectID' role='button' class='btn btn-outline-danger'>"."消去"."</a>"."</td>
                </tr>
              ";
            }
          }
        ?>
      </tbody>
    </table>
        </div>
    


  </div>

  <?php
include "footer.php";
?>