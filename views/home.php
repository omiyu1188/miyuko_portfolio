<?php
include "../postAction.php";
include "../todoAction.php";
// include "../userAction.php";
// $login_id=$_SESSION["login_id"];
// $user_detail = $user->getSpecificUser($login_id);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Home</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/shards.min.css?v=3.0.0">
  <link rel="stylesheet" href="../css/shards-demo.min.css?v=3.0.0">
  <script src="https://kit.fontawesome.com/b919d7d2ee.js" crossorigin="anonymous"></script>
  
</head>
<body style="background-image:url(../image/index-background.png);">
  <?php
    include "header.php";
  ?>
  <div class="row my-5">
    <div class="col-md-3  overflow-auto" style="height:800px;">
      <div class="card mx-auto w-75 p-3">
        <div class="card-body">
          <h4>TODO LISTS</h4><br>
          <div class="row">
            <div class="col-md-12">
        <!-- <div class="card mx-auto border border-0"> -->
        
          <!-- <div class="card-body"> -->
            <form action="" method="post">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <input type="text" class="p-2 form-control"  name="todo_name" placeholder="Add New Task" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <input type="hidden" name="login_id" value="<?php echo '';?>">
                  <button type="submit" class="btn text-white form-control" style="background-color:purple;"  name="addTodo" required>ADD</button>
                </div>
              </div>
            </form>
          <!-- </div> -->
        <!-- </div> -->
            </div>
            <div class="col-md-12">
              <h4 class="mb-3 mt-5">CURRENT TASKS</h4>
            <table class="table table-hover  mx-auto ">
              <!-- <thead class=""> -->
                <!-- <th>No.</th> -->
                <th>Task</th>
                <th></th>
              <!-- </thead> -->
              <tbody>
                <?php
                  $login_id=$_SESSION["login_id"];
                  $todolist=$todo->getTodo($login_id);
                  if(empty($todolist)){
                    
                  }else{
                    foreach($todolist as $todo){
                      $todoID=$todo["todo_id"];
                      echo "
                      <tr>
                      
                      <td>".$todo['todo_name']."</td>
                      <td><a href='todoDelete.php?id=$todoID' role='button' class='' style='color:purple;'>"."<i class='far fa-check-circle'></i>"."</a>"."</td>
                      </tr>
                      ";
                    }
                  }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-5 overflow-auto" style="height:800px;">
    <div class="card mx-auto">
      <div class="card-header bg-white text-dark">
      
              <h2 class="text-center mt-5">
                TODAY'S REPORT
              </h2>
            </div>
            <div class="card-body">

            <?php
              if(isset($_POST["save_how_many"])){
                include "../subjectAction.php";

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
      <?php
        $datelist = $post->getDates();
        $postlist = $post->getPosts();

        // print_r($datelist);

        foreach($datelist as $dates){
          $post_count = $dates['post_count'];
          $date = $dates['date'];
          $comment = $dates['comment'];
          $user_login_id = $dates['user_login_id'];
          $name = $dates['name'];
          // $picture = $dates['picture'];
          $post_id = $dates['post_id'];
          $totalHour = $dates['totalHour'];
          $totalMinute = $dates['totalMinute'];

          // echo "<br>".$post_count."=".$date;

        ?>
        <!-- START OF CARD -->
        <div class="card mt-4">
        <div class="card-header bg-white pm-0">
        <div class="row">
          <div class="col-md-6">
            <a href="profile.php?id=<?php echo $user_login_id ?>">
              <img src='../upload/<?php echo $user_detail["picture"] ?>' class='img-fluid rounded-circle' style="width:45px; display:inline;">
              &nbsp;
              <span class="text-black" style="font-size:25px;"><?php echo $name?></span>
            </a>
          </div>
          <div class="col-md-6">
            <p class="text-right"><?php echo $date;?></p>
          </div>
        </div>
        </div>
        <div class="card-body pt-0">
        <?php

          for($i = 0; $i < $post_count; $i++){
              $post_details = $post->getDatedPosts($date);
        ?>

            <span class="font-weight-bold"><?php echo $post_details[$i]['subject_name'];?>: </span><?php echo $post_details[$i]['time_hour']."hr ".$post_details[$i]['time_minute']."min";?><br>
          
            <?php
          }
          // $subject_count=count($post_details[$i]['subject_name']);
          ?>
          <p class="font-weight-bold border-top mt-2 mb-3">TOTAL:
            <?php
              if($totalMinute>=60 && $totalMinute<120){
                $totalMinute=$totalMinute-60;
                $totalHour=$totalHour+1;
              }elseif($totalMinute>=120 && $totalMinute<180){
                $totalMinute=$totalMinute-120;
                $totalHour=$totalHour+2;
              }
              elseif($totalMinute>=180 && $totalMinute<240){
                $totalMinute=$totalMinute-180;
                $totalHour=$totalHour+3;
              }elseif($totalMinute>=240 && $totalMinute<300){
                $totalMinute=$totalMinute-240;
                $totalHour=$totalHour+4;
              }
              elseif($totalMinute>=300 && $totalMinute<360){
                $totalMinute=$totalMinute-300;
                $totalHour=$totalHour+5;
              }elseif($totalMinute>=360 && $totalMinute<420){
                $totalMinute=$totalMinute-360;
                $totalHour=$totalHour+6;
              }elseif($totalMinute>=420 && $totalMinute<480){
                $totalMinute=$totalMinute-420;
                $totalHour=$totalHour+7;
              }
              echo $totalHour."hr".$totalMinute."min";
            ?>
          </p>
        <p><?php echo $comment?></p>
        </div>
          <div class="card-footer border-top">
            <form action="" method="post">
            <?php 
            // echo $login_id;
            ?>
            <input type="hidden" value="<?php echo $post_id; ?>">
            <input type="hidden" value="<?php echo $login_id;?>">
            
              <?php
                if(isset($_POST["fav"])){
                  echo "
                  <button class='btn' type='submit' name='delete_fav' onclick='location.href=''>
                  <i class='fas fa-heart'></i>
                  </button>
                  ";
                }
                elseif(isset($_POST["delete_fav"])){
                  echo "
                  <button class='btn' type='submit' name='fav'>
                  <i class='far fa-heart'></i>
                  ";
                }else{
                  echo "
                  <button class='btn' type='submit' name='fav'>
                  <i class='far fa-heart'></i>
                  </button>
                  ";
                }
              ?>
            </form>
          </div>
    
        </div>
        <!-- END OF CARD -->


        <?php
          // for($i = 0; $i < $post_count; $i++){
          //   $post_details = $post->getDatedPosts($login_id, $date);
            
          //   echo "<div class='card mt-4'>";
          //   if($post_details[$i]['subject_name'] == "HTML"){
          //     echo "<div class='card-header bg-danger text-white'>
          //     <div class='row'>
          //       <div class='col-md-6 text-left'>
          //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
          //       </div>
          //       <div class='col-md-6 text-right'>
          //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
          //       </div>
          //     </div> 
          //   </div>";
          //   }elseif($post_details[$i]['subject_name'] == "CSS"){
          //     echo "<div class='card-header bg-primary text-white'>
          //     <div class='row'>
          //       <div class='col-md-6 text-left'>
          //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
          //       </div>
          //       <div class='col-md-6 text-right'>
          //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
          //       </div>
          //     </div> 
          //   </div>";
          //   }elseif($post_details[$i]['subject_name'] == "Javascript"){
          //     echo "<div class='card-header bg-warning text-white'>
          //     <div class='row'>
          //       <div class='col-md-6 text-left'>
          //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
          //       </div>
          //       <div class='col-md-6 text-right'>
          //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
          //       </div>
          //     </div> 
          //   </div>";
          //   }elseif($post_details[$i]['subject_name'] == "PHP"){
          //     echo "<div class='card-header bg-secondary text-white'>
          //     <div class='row'>
          //       <div class='col-md-6 text-left'>
          //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
          //       </div>
          //       <div class='col-md-6 text-right'>
          //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
          //       </div>
          //     </div> 
          //   </div>";
          //   }elseif($post_details[$i]['subject_name'] == "SQL"){
          //     echo "<div class='card-header bg-info text-white'>
          //     <div class='row'>
          //       <div class='col-md-6 text-left'>
          //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
          //       </div>
          //       <div class='col-md-6 text-right'>
          //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
          //       </div>
          //     </div> 
          //   </div>";
          //   }elseif($post_details[$i]['subject_name'] == "English"){
          //     echo "<div class='card-header bg-success text-white'>
          //     <div class='row'>
          //     <div class='col-md-6 text-left'>
          //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
          //     </div>
          //       <div class='col-md-6 text-right'>
          //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
          //       </div>
          //     </div> 
          //     </div>";
          //   }
          //   echo "<div class='card-body'>
          //         ".$post_details[$i]['time_hour']."h".$post_details[$i]['time_minute']."min"
          //         ."</div>
          //         </div>"
          //         ;
          // }
        }
      ?>
    </div>
    <div class="col-md-3">
    <div class="container">
    <div class="card w-75 mx-auto">
      <!-- <div class="card-header">
        
      </div> -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <a href="profileEdit.php">
              <img src='../upload/<?php echo $user_detail["picture"] ?>' class='img-fluid rounded-circle'>
            </a>
          </div>
          <div class="col-md-8">
            <p>
              <a href="profileEdit.php" class="text-black">
                <strong style="font-size:30px;"><?php echo $user_detail["name"] ?></strong>
              </a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p class="pb-1 mb-2 border-bottom">Your goal: </p>
            <p>
              <?php echo $user_detail["bio"] ?>
            </p>
          </div>
        </div>
      </div>
    </div>
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
