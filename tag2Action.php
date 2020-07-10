<?php
  require_once "class/tag.php";
  $tag = new Tag();

  if(!isset($_SESSION)){
    session_start();
    }

?>