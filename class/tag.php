<?php
  require_once "database.php";
  class Tag extends Database{

    public function createTag($name,$login_id){
      $name=$this->conn->real_escape_string($name);
      $sql="INSERT INTO tags (tag_name,login_id) VALUES ('$name','$login_id') ";
      $result=$this->conn->query($sql);
      if($result==false){
        die("cannot add tag ". $this->conn->error);
      }else{
        header("location:tag.php");
      }
    }

    public function getTags($login_id){
      $sql="SELECT * FROM tags WHERE login_id='$login_id'";
      $result=$this->conn->query($sql);
      $row=array();

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }
    }

    
    public function getSpecificTag($id,$login_id){
      $sql="SELECT * FROM tags WHERE id='$id' AND login_id='$login_id'";

      $result=$this->conn->query($sql);
      if($result==false){
        die ("no record found: ".$this->conn->error);
      }else{
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
      }
      return $rows;
    }
  }

    public function editTag($id,$new_name,$login_id){
      $new_name=$this->conn->real_escape_string($new_name);
      $sql = "UPDATE tags 
              SET tag_name='$new_name'
              WHERE id = '$id' AND
              login_id='$login_id'
      ";
      $result=$this->conn->query($sql);
      if($result==false){
        die ("cannot update ".$this->conn->error);
      }else{
        header("location:tag.php");
      }
    }

    public function deleteTag($id){
      $sql="DELETE from tags WHERE id='$id'";
      $result = $this->conn->query($sql);
      if($result == false){
        die ("Cannot Delete: ".$this->conn->error);
      }else{
        header("Location:tag.php");
      }
    }

  }
?>