<?php
include "../subjectAction.php";


// include "../userAction.php";
// $id=$_SESSION["id"];
// $row=getOneUser($id);
// $login_id=$_SESSION["login_id"];

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Subject List</title>
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
    $subject_id=$_GET["id"];
// $login_id=$_SESSION["login_id"];
$subject_detail = $subject->getSpecificSubject($subject_id,$login_id);
  ?>
  <div class="container-fluid mt-5 w-50">
    <div class="row">
      <div class="col-12">
  <!-- <div class="card mx-auto border border-0 mt-5"> -->
    <!-- <div class="card-body"> -->
    <?php
                
                // echo $id;
                // foreach($tag_detail as $detail){
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
                      <input type="submit" class="btn btn-outline-success  form-control" name="updatesubject" value="SAVE">
                    </div>
                  </div>
                  </form>
                 ';
                // }
            ?>
    <!-- </div> -->
  <!-- </div> -->
      </div>
      </div>
  
         
          <div class="row">
    <div class="col-12">
    <table class="table table-hover table-striped table-bordered mx-auto my-5 ">
      <thead class="thead-dark">
        <th>No.</th>
        <th>Task</th>
        <th></th>
      </thead>
      <tbody>
        <?php
          $login_id=$_SESSION["login_id"];
          $subjectlist=$subject->getSubject($login_id);
          foreach($subjectlist as $subject){
            $subjectID=$subject["subject_id"];
            echo "
              <tr>
                <td>".$subject['subject_id']."</td>
                <td>".$subject['subject_name']."</td>
                <td>"."<a href='subjectEdit.php?id=$subjectID' role='button' class='btn btn-outline-warning mr-4'>"."Edit"."</a>
                <a href='subjectDelete.php?id=$subjectID' role='button' class='btn btn-outline-danger'>"."Delete"."</a>"."</td>
              </tr>
            ";
          }
        ?>
      </tbody>
    </table>
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
