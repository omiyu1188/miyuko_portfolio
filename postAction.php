<?php
  require_once "class/post.php";
  $post = new Post();
  session_start();


  if(isset($_POST["addPost"])){
    $subject_id = $_POST["subject"];
    $hour =$_POST["hour"];
    $minute =$_POST["minute"];
    $comment=$_POST["comment"];
    $date=$_POST["date"];
    $login_id= $_SESSION["login_id"];
    $count=$_POST["count"];

    $post->createPost($subject_id,$hour,$minute,$comment,$date,$login_id,$count);
  }elseif(isset($_POST["updatePost"])){
    
    $post_id=$_POST["post_id"];
    $new_name=$_POST["new_name"];
    $new_meaning=$_POST["new_meaning"];
    $new_example=$_POST["new_example"];
    $new_parts_of_speech=$_POST["new_parts_of_speech"];
    $login_id=$_SESSION["login_id"];
    $new_tag_id=$_POST["new_tag_id"];
    
    $post->editPost($post_id,$new_name,$new_meaning,$new_example,$new_parts_of_speech,$login_id,$new_tag_id);
  }elseif(isset($_POST["like"])){
    $post_id=$_POST["post_id"];
    $login_id=$_SESSION["login_id"];
    $likeExistence=$post->likeExistence($post_id,$login_id);
    if(is_array($array)){
      foreach((array)$likeExistence as $data){
        $li_ex=$data["cnt"];
      }
    }
    if(isset($likeExistence)){
      $post->deleteLike($post_id,$login_id);
    }else{
      $post->likePost($post_id,$login_id);
    }

  }


?>