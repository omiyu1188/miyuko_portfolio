<?php
  require_once "class/todo.php";
  $todo = new Todo();
  if(!isset($_SESSION)){
    session_start();
  }

  if(isset($_POST["addTodo"])){
    $todo_name =$_POST["todo_name"];
    $login_id= $_SESSION["login_id"];

    // echo $name,$meaning,$example,$parts_of_speech,$login_id,$tag_id;
    
    $todo->createTodo($todo_name,$login_id);
  }elseif(isset($_POST["updateTodo"])){
    
    $todo_id=$_POST["todo_id"];
    $login_id=$_SESSION["login_id"];
    if(empty($_POST["new_name"])){
      $new_name=$_POST["old_name"];
    }else{
      $new_name=$_POST["new_name"];
    }
    $todo->editTodo($todo_id,$new_name,$login_id);
  }


?>