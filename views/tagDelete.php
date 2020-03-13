<?php
  include "../tagAction.php";
  $id=$_GET["id"];
  $tag->deleteTag($id);
?>