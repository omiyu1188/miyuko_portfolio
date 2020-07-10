<?php
include "../postAction.php";
include "../todoAction.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ホーム</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/shards.min.css?v=3.0.0">
  <link rel="stylesheet" href="../css/shards-demo.min.css?v=3.0.0">
  <script src="https://kit.fontawesome.com/b919d7d2ee.js" crossorigin="anonymous"></script>
  
</head>
<body style="background-image:url(../image/index-background.png); background-size:cover; margin:0; padding:0;">
  <?php
    include ("header.php");
  ?>
  <div class="row my-5">
    <div class="pc col-md-3" >
      <div class="card mx-auto w-75 p-1 overflow-auto"style="height:650px;">
        <div class="card-body">
          <h3 class="text-center">TODO LISTS</h3><br>
          <div class="row">
            <div class="col-md-12">
              <form action="" method="post">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <input type="text" class="p-2 form-control"  name="todo_name" placeholder="タスクを入力..." required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <input type="hidden" name="login_id" value="<?php echo '';?>">
                    <button type="submit" class="btn text-white form-control" style="background-color:purple;"  name="addTodo" required>追加</button>
                  </div>
                </div>
              </form>
            </div>
            <?php 
              $login_id=$_SESSION["login_id"];
              $todolist=$todo->getTodo($login_id);
              if(isset($todolist)):
            ?>
            <div class="col-md-12">
              <h5 class="mb-3 mt-5">CURRENT TASKS</h5>
              <table class="table table-hover  mx-auto ">
                <tbody>
                  <?php
           
                      foreach($todolist as $todo){
                        $todoID=$todo["todo_id"];
                        echo "
                        <tr>
                        
                        <td>".$todo['todo_name']."</td>
                        <td><a href='todoDelete.php?id=$todoID' role='button' class='' style='color:purple;'>"."<i class='far fa-check-circle'></i>"."</a>"."</td>
                        </tr>
                        ";
                      }
                    
                    ?>
                </tbody>
              </table>
            </div>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="pc-scroll sp-width col-md-6 mb-5 ">
    <?php

      include "../subjectAction.php";
      $subjectlist=$subject->getSubjects($login_id);
      if(empty($subjectlist)):

    ?>
    <div class="card mx-auto">
      <div class="card-header bg-white text-dark">
        <h2 class="text-center mt-5">
          ① 科目/教材の追加
        </h2>
      </div>
      <div class="card-body text-center">
        <a href="subject.php">こちらをクリックして、今学習している科目/教材の登録をしてください。</a><br><br>
        <a href="subject.php" class="btn btn-primary">科目/教科の登録</a>
        <form action="" method="post">
      </div>
    </div>
    <?php else: ?>
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
                  echo '
                  <div class="form-row w-75 mx-auto">
                      <input type="hidden" name="count" value="'.$num.'">
                      <div class="form-group col-md-6">
                      <label>科目/教材</label>
                      <select name="subject[]" class="form-control">
                      <option hidden>choose ...</option>';
                              foreach($subjectlist as $detail){
                                $subject_id=$detail["subject_id"];
                                echo '
                                <option value="'.$subject_id.'">'.$detail["subject_name"].'</option>
                                ';
                              }
                      echo '
                      </select>
                      </div>
                      
                      <div class="form-group col-md-3">
                        <label>時間</label>
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
                        <label>分</label>
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
                <label for="">コメント</label>
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
                        <label for="">日付</label>
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
                          <label for="">本日学習した科目/教材の個数を入力してください。</label>
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
    <?php endif; ?>
      <?php
        $datelist = $post->getDates();
        $postlist = $post->getPosts();

        foreach((array)$datelist as $dates){
          $post_count = $dates['post_count'];
          $date = $dates['date'];
          $comment = $dates['comment'];
          $user_login_id = $dates['user_login_id'];
          $name = $dates['name'];
          $picture = $dates['picture'];
          $post_id = $dates['post_id'];
          $totalHour = $dates['totalHour'];
          $totalMinute = $dates['totalMinute'];
        ?>
        <!-- START OF CARD -->
        <div class="card mt-4">
        <div class="card-header bg-white pm-0">
        <div class="row">
          <div class="col-md-6">
            <a href="profile.php?id=<?php echo $user_login_id ?>">
              <img src='../upload/<?php echo $picture?>' class='img-fluid rounded-circle' style="width:45px; display:inline;">
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
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <input type="hidden" value="<?php echo $login_id;?>">
            
              <?php
                $likeCount = $post->likeCount($post_id);
                foreach ((array)$likeCount as $likeData){
                  if($likeData['li_cnt'] >=1){

                    $li_cnt=$likeData['li_cnt'];
                  }
                }
                $likeExistence=$post->likeExistence($post_id,$login_id);

                echo "<button type='submit' class='btn' name='like'>";
                if(isset($likeExistence)){
                  echo "<i class='fas fa-heart text-danger' id ='$post_id'></i>";
                  echo "<span class='likes_count' id='likes_count_$post_id'zz>  $li_cnt </span>";
                }else{
                  echo "<i class='far fa-heart' id ='$post_id'></i>";
                }
                echo "</button>"
              ?>
            </form>
          </div>
        </div>
        <?php
        }
      ?>
    </div>
    <div class="pc col-md-3">
    <div class="card w-75 mx-auto">
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
                <strong style="font-size:30px;"><?php echo $user_detail["name"] ?>&nbsp; </strong>
              </a>
              <a href="profileEdit.php" class="text-black">
                <i class="fas fa-cog mute" style="color:grey;"></i>
              </a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p class="pb-1 mb-2 border-bottom">目標: </p>
            <p>
              <?php echo $user_detail["bio"] ?>
            </p>
          </div>
      </div>
    </div>
  </div>
    </div>
  </div>

<?php
include "footer.php";
?>

<style>
  .accordion_todo{

  }
</style>