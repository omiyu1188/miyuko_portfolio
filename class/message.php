<?php
  require_once "database.php";
  class Message extends Database{
    public function createMessage($text,$receiver_id,$sender_id){
      $text=$this->conn->real_escape_string($text);
      $sql="INSERT INTO messages(text,receiver_id,sender_id)VALUES('$text','$receiver_id','$sender_id')";
      $result=$this->conn->query($sql);
      if($result==false){
        die("cannot send message ". $this->conn->error);
      }else{
        header("location:message.php?id=$receiver_id");
     } 
      
    }
    public function getMessage($receiver_id,$sender_id){
      $sql="SELECT messages.text,messages.receiver_id,messages.sender_id,users.name,users.picture FROM messages INNER JOIN users ON messages.sender_id = users.login_id WHERE (messages.receiver_id='$receiver_id' AND messages.sender_id='$sender_id') OR  (messages.receiver_id='$sender_id' AND messages.sender_id='$receiver_id') ORDER BY messages.message_id asc";
      $result=$this->conn->query($sql);
      
      $rows = array();
      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }
    }

    public function getMessages($sender_id){
      $sql="SELECT messages.text,messages.receiver_id,messages.sender_id,users.name,users.picture,users.login_id AS ahaha FROM messages INNER JOIN users ON messages.receiver_id=users.login_id OR messages.sender_id = users.login_id WHERE messages.receiver_id='$sender_id' OR  messages.sender_id='$sender_id' ORDER BY messages.message_id desc";
      $result=$this->conn->query($sql);
      
      $rows = array();
      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }
    }


  }

?>