<?php
  require_once "class/tag.php";
  $tag = new Tag();

  if(!isset($_SESSION)){
    session_start();
    }

  // if(isset($_POST["addTag"])){
  //   $name =$_POST["name"];
  //   $login_id=$_SESSION["login_id"];
    
  //   $tag->createTag($name,$login_id);
  // }elseif(isset($_POST["updateTag"])){
    
  //   $id=$_POST["tag_id"];
  //   $login_id=$_SESSION["login_id"];
  //   if(empty($_POST["new_name"])){
  //     $new_name=$_POST["old_name"];
  //   }else{
  //     $new_name=$_POST["new_name"];
  //   }
  //   $tag->editTag($id,$new_name,$login_id);
  // }


?>