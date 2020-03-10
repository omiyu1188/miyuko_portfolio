<?php
  require_once "class/tag.php";
  $tag = new Tag();
  session_start();

  if(isset($_POST["addTag"])){
    $name =$_POST["name"];
    
    $tag->createTag($name);
  }elseif(isset($_POST["updateTag"])){
    
    $id=$_POST["tag_id"];
    
    if(empty($_POST["new_name"])){
      $new_name=$_POST["old_name"];
    }else{
      $new_name=$_POST["new_name"];
    }
    $tag->editTag($id,$new_name);
  }


?>