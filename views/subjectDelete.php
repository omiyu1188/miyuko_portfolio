<?php
  include "../subjectAction.php";
  $id=$_GET["id"];
  $subject->deleteSubject($id);
?>