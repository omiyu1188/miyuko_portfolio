<?php
  require_once "class/subject.php";
  $subject = new Subject();
  session_start();

  if(isset($_POST["addSubject"])){
    $subject_name =$_POST["subject_name"];
    $login_id= $_SESSION["login_id"];

    // echo $name,$meaning,$example,$parts_of_speech,$login_id,$tag_id;
    
    $subject->createSubject($subject_name,$login_id);
  }elseif(isset($_POST["updateSubject"])){
    
    $subject_id=$_POST["subject_id"];
    $login_id=$_SESSION["login_id"];
    if(empty($_POST["new_name"])){
      $new_name=$_POST["old_name"];
    }else{
      $new_name=$_POST["new_name"];
    }
    $subject->editSubject($subject_id,$new_name,$login_id);
  }


?>