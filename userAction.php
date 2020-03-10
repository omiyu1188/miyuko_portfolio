<?php
  require_once "class/user.php";
  $user = new User();
  session_start();

  if(isset($_POST["signup"])){
    $name=$_POST["name"];
    $gender=$_POST["gender"];
    $status=$_POST["status"];
    $email=$_POST["email"];
    $password=md5($_POST["password"]);

    $user->createUser($name,$gender,$status,$email,$password);
    
  }elseif(isset($_POST["login"])){
    $email=$_POST["email"];
    $password=md5($_POST["password"]);

    $login=$user->login($email,$password);

    if($login){
      $_SESSION["login_id"]=$login["id"];

      header('location:views/wordbank.php');
    }else{
      echo "incorrect email or password";
    }



  }
?>