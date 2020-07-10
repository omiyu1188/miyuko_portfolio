<?php
  require_once "database.php";
  class Todo extends Database{
    public function createTodo($todo_name,$login_id){
      $todo_name=$this->conn->real_escape_string($todo_name);
      $sql="INSERT INTO todo(todo_name,login_id)VALUES('$todo_name','$login_id')";
      $result=$this->conn->query($sql);
      
      if($result==false){
        die("cannot add task: ".$this->conn->error);
      }else{
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: ".$uri);  
      }
    }
    
    public function getTodo($login_id){
      $sql="SELECT * FROM todo WHERE login_id='$login_id'";
      $result=$this->conn->query($sql);
      $row=array();

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }
    }

    
    public function getSpecificTodo($todo_id,$login_id){
      $sql="SELECT *FROM todo WHERE todo_id='$todo_id' AND login_id='$login_id'";

      $result=$this->conn->query($sql);
      if($result==false){
        die ("no record found: ".$this->conn->error);
      }else{
        return $result->fetch_assoc();
      }
    }

    public function editTodo($todo_id,$new_name,$login_id){
      $new_name=$this->conn->real_escape_string($new_name);
      $sql = "UPDATE todo
              SET todo_name='$new_name'
              WHERE todo_id = '$todo_id' AND login_id='$login_id'
      ";
      $result=$this->conn->query($sql);
      if($result==false){
        die ("cannot update ".$this->conn->error);
      }else{
        header("location: todo.php");
      }
    }

    public function deleteTodo($todo_id){
      $sql="DELETE from todo WHERE todo_id='$todo_id'";
      $result = $this->conn->query($sql);
      if($result == false){
        die ("Cannot Delete: ".$this->conn->error);
      }else{
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: ".$uri);  
      }
    }

  }
?>