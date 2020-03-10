<?php
  require_once "class/word.php";
  $word = new Word();
  session_start();

  if(isset($_POST["addWord"])){
    $name =$_POST["name"];
    $meaning = $_POST["meaning"];
    $example =$_POST["example"];
    $parts_of_speech=$_POST["parts_of_speech"];
    $login_id= $_SESSION["login_id"];
    $tag_id=$_POST["tag"];

    // echo $name,$meaning,$example,$parts_of_speech,$login_id,$tag_id;
    
    $word->createWord($name,$meaning,$example,$parts_of_speech,$login_id,$tag_id);
  }elseif(isset($_POST["updateWord"])){
    
    $word_id=$_POST["word_id"];
    $new_name=$_POST["new_name"];
    $new_meaning=$_POST["new_meaning"];
    $new_example=$_POST["new_example"];
    $new_parts_of_speech=$_POST["new_parts_of_speech"];
    $login_id=$_SESSION["login_id"];
    $new_tag_id=$_POST["new_tag_id"];
    
    $word->editWord($word_id,$new_name,$new_meaning,$new_example,$new_parts_of_speech,$login_id,$new_tag_id);
  }


?>