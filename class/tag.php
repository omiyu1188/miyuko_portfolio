<?php
  require_once "database.php";
  class Tag extends Database{

    public function createTag($name){
      $sql="INSERT INTO tags (tag_name) VALUES ('$name') ";
      $result=$this->conn->query($sql);
      if($result==false){
        die("cannot add tag ". $this->conn->error);
      }else{
        header("location:tag.php");
      }
    }

    public function getTags(){
      $sql="SELECT * FROM tags";
      $result=$this->conn->query($sql);
      $row=array();

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }
    }

    
    public function getSpecificTag($id){
      $sql="SELECT * FROM tags WHERE id='$id'";

      // echo $sql;
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

    public function editTag($id,$new_name){
      $sql = "UPDATE tags 
              SET tag_name='$new_name'
              WHERE id = '$id'
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