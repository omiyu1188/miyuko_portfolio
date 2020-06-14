<?php
  require_once "class/message.php";
  $message = new Message();

  if(!isset($_SESSION)){
    session_start();
  }

  if(isset($_POST["addMessage"])){
    $text = $_POST["text"];
    $receiver_id = $_GET["id"];
    $sender_id = $_SESSION["login_id"];

    $message->createMessage($text,$receiver_id,$sender_id);
  }
?>