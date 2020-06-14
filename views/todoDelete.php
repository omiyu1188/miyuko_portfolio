<?php
  include "../todoAction.php";
  $todo_id=$_GET["id"];
  $todo->deleteTodo($todo_id);
?>