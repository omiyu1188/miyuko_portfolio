<?php
  require_once "database.php";
  class Subject extends Database{
    public function createSubject($subject_name,$login_id){
      $subject_name=$this->conn->real_escape_string($subject_name);
      $sql="INSERT INTO subjects(subject_name,login_id)VALUES('$subject_name','$login_id')";
      $result=$this->conn->query($sql);

      if($result==false){
        die("cannot add task: ".$this->conn->error);
      }else{
        header("location:subject.php");
      }
    }
    
    public function getSubjects($login_id){
      $sql="SELECT * FROM subjects WHERE login_id='$login_id'";
      $result=$this->conn->query($sql);
      $row=array();

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }
    }

    
    public function getSpecificSubject($subject_id,$login_id){
      $sql="SELECT *FROM subjects WHERE subject_id='$subject_id' AND login_id='$login_id'";

      $result=$this->conn->query($sql);
      if($result==false){
        die ("no record found: ".$this->conn->error);
      }else{
        return $result->fetch_assoc();
      }
    }

    public function editSubject($subject_id,$new_name,$login_id){
      $new_name=$this->conn->real_escape_string($new_name);
      $sql = "UPDATE subjects
              SET subject_name='$new_name'
              WHERE subject_id = '$subject_id' AND login_id='$login_id'
      ";
      $result=$this->conn->query($sql);
      if($result==false){
        die ("cannot update ".$this->conn->error);
      }else{
        header("location: subject.php");
      }
    }

    public function deleteSubject($subject_id){
      $sql="DELETE from subjects WHERE subject_id='$subject_id'";
      $result = $this->conn->query($sql);
      if($result == false){
        die ("Cannot Delete: ".$this->conn->error);
      }else{
        header("Location:subject.php");
      }
    }
    
  }
?>