<?php
// include "../postAction.php";
// include "../subjectAction.php";
// echo "<pre>";
// print_r( $subject->getSubjects($login_id));
// echo "</pre>";


?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Write Report</title>
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
  <div class="container w-50">
  <div class="card mx-auto my-5 border border-0">
    <div class="card-header bg-white text-dark border-0">
      <div class="form-row mt-3">
        <div class="form-group mr-auto ">
          <div class="input-group">
             <a href="post.php" role="button" class="text-primary">BACK</a>
          </div>
        </div>
      </div>
            <h2 class="text-center mt-5">
              TODAY'S REPORT
            </h2>
          </div>
          <div class="card-body">

          <?php
            if(isset($_POST["save_how_many"])){
              include "../subjectAction.php";
              // $login_id=$_SESSION["login_id"];

              $num=$_POST["how_many"];
              echo '<form action="../postAction.php" method="post">';
              
              for($i=0;$i<$num;$i++){  
                $subjetlist=$subject->getSubjects($login_id);
                echo '
                <div class="form-row w-75 mx-auto">
                    <input type="hidden" name="count" value="'.$num.'">
                    <div class="form-group col-md-6">
                    <label>Subject</label>
                    <select name="subject[]" class="form-control">
                    <option hidden>choose ...</option>';
                            foreach($subjetlist as $detail){
                              $subject_id=$detail["subject_id"];
                              echo '
                              <option value="'.$subject_id.'">'.$detail["subject_name"].'</option>
                              ';
                            }
                    echo '
                    </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label>Hours</label>
                      <div class="input-group">
                        <select name="hour[]" class="form-control p-2">
                          <option>0</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group col-md-3">
                      <label>Minutes</label>
                      <div class="input-group">
                        <select name="minute[]" class="form-control p-2">
                          <option>0</option>
                          <option>5</option>
                          <option>10</option>
                          <option>15</option>
                          <option>20</option>
                          <option>25</option>
                          <option>30</option>
                          <option>35</option>
                          <option>40</option>
                          <option>45</option>
                          <option>50</option>
                          <option>55</option>
                        </select>
                      </div>
                    </div>

              </div>
                ';
              }
              echo '
              <div class="form-row w-75 mx-auto">
              <div class="form-group col-md-12">
              <label for="">Comment</label>
              <div class="input-group">
              <span class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="far fa-comment"></i>
                      </span>
                      </span>
                      <textarea type="text" name="comment" class="form-control p-2"></textarea>
                      </div>
                      </div>
                      </div>
                      <div class="form-row w-75 mx-auto">
                      <div class="form-group col-md-12">
                      <label for="">Date</label>
                      <div class="input-group">
                      <span class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                      </span>
                      </span>
                      <input type="date" name="date" class="form-control p-2">
                      </div>
                      </div>
                      </div>
                      <div class="form-row w-75 mx-auto mt-3">
                      <div class="form-group col-md-12">
                      <div class="input-group">
                      <button type="submit"   name="addPost" class="form-control btn btn-info form-control text-uppercase">SAVE</button>
                      </div>
                      </div>
                      </div>
                      </form>
                      
                      ';
                      
                      
                    }
                    else{
                      echo '
                      <form action="" method="post">
                      <div class="form-row w-75 mx-auto">
                        <label for="">How Many Subjects Did You Study?</label>
                        <div class="form-group col-md-9">
                          <input type="number" name="how_many" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                          <button  type="submit" name="save_how_many" class="form-control btn btn-info">NEXT</button>
                        </div>
                      </div>
                    </form>
                        ';
                    }
                    ?>

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
