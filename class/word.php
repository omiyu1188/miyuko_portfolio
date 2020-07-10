<?php
  require_once "database.php";
  class Word extends Database{
    public function createWord($name,$meaning,$example,$parts_of_speech,$login_id,$tag_id){
      $example=$this->conn->real_escape_string($example);
      $sql="INSERT INTO words(word_name,meaning,example,parts_of_speech,login_id,tag_id)VALUES('$name','$meaning','$example','$parts_of_speech','$login_id','$tag_id')";

      $result=$this->conn->query($sql);
      if($result==false){
        die("cannot add word: ".$this->conn->error);
      }else{
        header("location:wordbank.php");
      }
    }
    
    public function getWords($login_id){
      $sql="SELECT *, words.id AS word_id, tags.id AS tag_id FROM words INNER JOIN tags ON words.tag_id =tags.id  WHERE words.login_id='$login_id' AND tags.login_id='$login_id'";
      $result=$this->conn->query($sql);
      $row=array();

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }
    }

    
    public function getSpecificWord($id,$login_id){
      $sql="SELECT *, words.id AS word_id, tags.id AS tag_id FROM words INNER JOIN tags ON words.tag_id=tags.id WHERE words.id='$id' AND words.login_id='$login_id'";

      $result=$this->conn->query($sql);
      if($result==false){
        die ("no record found: ".$this->conn->error);
      }else{
        return $result->fetch_assoc();
      }
    }

    public function editWord($word_id,$new_name,$new_meaning,$new_example,$new_parts_of_speech,$login_id,$new_tag_id){
      $new_example=$this->conn->real_escape_string($new_example);
      $sql = "UPDATE words
              INNER JOIN tags ON words.tag_id=tags.id 
              SET words.word_name='$new_name',
                  words.meaning='$new_meaning',
                  words.example='$new_example',
                  words.parts_of_speech='$new_parts_of_speech',
                  words.tag_id='$new_tag_id'
              WHERE words.id = '$word_id' AND words.login_id='$login_id'
      ";
      $result=$this->conn->query($sql);
      if($result==false){
        die ("cannot update ".$this->conn->error);
      }else{
        header("location: wordbank.php");
      }
    }

    public function deleteWord($id){
      $sql="DELETE from words WHERE id='$id'";
      $result = $this->conn->query($sql);
      if($result == false){
        die ("Cannot Delete: ".$this->conn->error);
      }else{
        header("Location:wordbank.php");
      }
    }

    public function getTagWords($login_id,$specificTag_id){
      $sql="SELECT *, words.id AS word_id, tags.id AS tag_id FROM words INNER JOIN tags ON words.tag_id =tags.id  WHERE words.login_id='$login_id' AND tags.login_id='$login_id' AND tags.id='$specificTag_id'";
      $result=$this->conn->query($sql);
      $row=array();

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }else{
        return false;
      }
    }

    public function getPartsOfSpeechWords($login_id,$specific_parts_of_speech){
      $sql="SELECT *, words.id AS word_id, tags.id AS tag_id FROM words INNER JOIN tags ON words.tag_id =tags.id  WHERE words.login_id='$login_id' AND tags.login_id='$login_id' AND words.parts_of_speech='$specific_parts_of_speech'";
      $result=$this->conn->query($sql);
      $row=array();

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }else{
        return false;
      }
    }

  }



?>