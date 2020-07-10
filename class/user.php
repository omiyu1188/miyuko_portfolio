<?php
  require_once "database.php";
  class User extends Database{
    public function createUser($name,$gender,$status,$email,$password){
      $sql="INSERT INTO login(email,password)VALUES('$email','$password')";

      $firstSql=$this->conn->query($sql);

      if($firstSql==false){
        die("first query is not working".$this->conn->error);
      }else{

        $recentID=$this->conn->insert_id;
        $secondSql="INSERT INTO users(name,gender,status,login_id)VALUES('$name','$gender','$status','$recentID')";
        $secondResult=$this->conn->query($secondSql);
    
        if($secondResult==FALSE){
          die("second query is not working".$this->conn->error);
        }else{
          header("location: views/login.php");
        }
      }
    }

    public function login($email,$password){
      $sql="SELECT * FROM users INNER JOIN login ON users.login_id=login.id WHERE login.email='$email' AND login.password='$password'";

      $result=$this->conn->query($sql);

      if($result->num_rows==1){
        return $result->fetch_assoc();

      }else{
        return false;
      }
    }

    public function getUsers(){
      $sql = "SELECT * FROM users";
      $result=$this->conn->query($sql);
      $rows=array();

      if($result->num_rows > 0){ 
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }
    }
    public function getSpecificUser($login_id){
      $sql = "SELECT * FROM users INNER JOIN login ON users.login_id=login.id WHERE users.login_id='$login_id'";

      $result=$this->conn->query($sql);
      if($result==false){
        die("No record found: ".$this->conn->error);

      }else{
        return $result->fetch_assoc();
      }
    }
    public function getClickedUser($clicked_login_id){
      $sql = "SELECT * FROM users INNER JOIN login ON users.login_id=login.id WHERE users.login_id='$clicked_login_id'";

      $result=$this->conn->query($sql);
      if($result==false){
        die("No record found: ".$this->conn->error);

      }else{
        return $result->fetch_assoc();
      }
    }
    
    public function insertToTable($picture,$login_id){
      $sql= "UPDATE users SET picture = '$picture' WHERE login_id = '$login_id'";

      if($this->conn->query($sql)){
          return 1;
      }else{
          echo "Not saved " .$this->conn->error;
          return 0;
      }
    }
    
    public function searchSpecificImage($login_id){
      $sql = "SELECT picture FROM users WHERE login_id = '$login_id'";
      $result = $this->conn->query($sql);

      $row = $result->fetch_assoc();

      return $row;
  }

    public function editPicture($new_picture,$login_id){
      $sql = "UPDATE users SET picture = '$new_picture' WHERE login_id='$login_id'";
      $result = $this->conn->query($sql);
      if($result == false){
        die ("Cannot Update: ".$this->conn->error);
      }else{
        header("Location:views/profileEdit.php");
      }

    }
    public function editUser($new_name,$new_status,$new_bio,$login_id){
      $sql = "UPDATE users 
              SET name = '$new_name',
                  status = '$new_status',
                  bio = '$new_bio'

              WHERE login_id = '$login_id'
              ";
      $result = $this->conn->query($sql);
      if($result == false){
        die ("Cannot Update: ".$this->conn->error);
      }else{
        header("Location:views/profileEdit.php");
      }
    }
    public function editPassword($new_email,$new_password,$login_id){
      $sql = "UPDATE login
              INNER JOIN users ON login.id=users.login_id
              SET login.email = '$new_email',
                  login.password = '$new_password'

              WHERE login.id = '$login_id'
              ";
      $result = $this->conn->query($sql);
      if($result == false){
        die ("Cannot Update: ".$this->conn->error);
      }else{
        header("Location:views/passwordEdit.php");
      }
    }

  }
?>