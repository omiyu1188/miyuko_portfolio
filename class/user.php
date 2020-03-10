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
    public function getSpecificUser($id){
      $sql = "SELECT * FROM users WHERE user_id='$id'";

      $result=$this->conn->query($sql);
      if($result==false){
        die("No record found: ".$this->conn->error);

      }else{
        return $result->fetch_assoc();
      }
    }
    // public function editUser($user_id,$new_first_name,$new_last_name,$new_username,$new_password){
    //   $sql = "UPDATE users 
    //           SET first_name = '$new_first_name',
    //               last_name = '$new_last_name',
    //               username = '$new_username',
    //               password = '$new_password'

    //           WHERE user_id = '$user_id'
    //           ";
    //   $result = $this->conn->query($sql);
    //   if($result == false){
    //     die ("Cannot Update: ".$this->conn->error);
    //   }else{
    //     header("Location:dashboard.php");
    //   }
    // }
    // public function deleteUser($user_id){
    //   $sql="DELETE from users WHERE user_id='$user_id'";
    //   $result = $this->conn->query($sql);
    //   if($result == false){
    //     die ("Cannot Delete: ".$this->conn->error);
    //   }else{
    //     header("Location:dashboard.php");
    //   }
    // }


  }
?>