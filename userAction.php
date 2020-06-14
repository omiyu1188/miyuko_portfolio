<?php
  require_once "class/user.php";
  $user = new User();
  if(!isset($_SESSION)){
    session_start();
  }

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

      header('location:views/home.php');
    }else{
      echo "incorrect email or password";
    }

  }elseif(isset($_POST['upload'])){
    $picture = $_FILES['pic']['name'];
    $login_id=$_SESSION["login_id"];
    $target_dir = "upload/"; //folder in your computer where you will place the picture
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);

    $ans = $user->insertToTable($picture,$login_id);

    if($ans == 1){
        // Upload file
        move_uploaded_file($_FILES['pic']['tmp_name'],$target_file);
        //move_uploaded_file ~~~ transfers the picture from one location
        // to another location
        header("Location:views/profileEdit.php");
    }else{
        echo "Error";
    }

  }elseif(isset($_POST['editPicture'])){
    $new_picture = $_FILES['new_pic']['name'];
    $login_id = $_SESSION["login_id"];
    $target_dir = "upload/"; 
    $target_file = $target_dir . basename($_FILES["new_pic"]["name"]);
    $ans = $user->editPicture($new_picture,$login_id);

    if($ans == 1){
      // Upload file
      move_uploaded_file($_FILES['new_pic']['tmp_name'],$target_file);
      //move_uploaded_file ~~~ transfers the picture from one location
      // to another location
      header("Location:views/profileEdit.php");
    }else{
      echo "Error";
    }

  }elseif(isset($_POST["editProfile"])){
    $login_id=$_SESSION["login_id"];
    $new_name=$_POST["new_name"];
    $new_status=$_POST["new_status"];
    $new_bio=$_POST["new_bio"];

    $user->editUser($new_name,$new_status,$new_bio,$login_id);
  }elseif(isset($_POST["editPassword"])){
    $login_id=$_SESSION["login_id"];
    $new_email=$_POST["new_email"];
    if(isset($_POST["new_password"])){
      $new_password=md5($_POST["new_password"]);
    }else{
      $new_password=md5($_POST["old_password"]);
    }

    $user->editPassword($new_email,$new_password,$login_id);
  }
?>