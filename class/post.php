<?php
  require_once "database.php";
  class Post extends Database{
    public function createPost($subject_id,$hour,$minute,$comment,$date,$login_id,$count){
      $comment=$this->conn->real_escape_string($comment);
      $sql="INSERT INTO posts(comment,date,login_id)VALUES('$comment','$date','$login_id')";
      
      // echo $sql;

      $firstResult=$this->conn->query($sql);
      if($firstResult){
        $secondSql="SELECT post_id FROM posts WHERE comment='$comment' AND date='$date'";
        $secondResult=$this->conn->query($secondSql);
        if($secondResult->num_rows==1){
          while($post=$secondResult->fetch_assoc()){
            $post_id=$post['post_id'];
          }
        }

        for($j=0;$j<$count;$j++){
          $thirdSql="INSERT INTO time(post_id,subject_id,time_hour,time_minute)VALUES('$post_id','$subject_id[$j]','$hour[$j]','$minute[$j]')";

          // echo $thirdSql;
          $thirdResult=$this->conn->query($thirdSql);
        }

        if($thirdResult==FALSE){
          die("third query is not working".$this->conn->error);
        }else{
          header("location:views/post.php");
        }
      }else{
        die("first query is not working".$this->conn->error);
      }
    }

    public function getDates($login_id){
      $sql = "SELECT date, COUNT(time.post_id) AS post_count, comment, name FROM posts INNER JOIN time ON time.post_id = posts.post_id INNER JOIN subjects ON subjects.subject_id = time.subject_id INNER JOIN users ON posts.login_id = users.login_id WHERE posts.login_id = '$login_id' GROUP BY time.post_id ORDER BY posts.date DESC";
      $result=$this->conn->query($sql);
      
      $dates = array();
      if($result->num_rows>0){
        while($date=$result->fetch_assoc()){
          $dates[]=$date;
        }
        return $dates;
      }
    }
    
    public function getDatedPosts($login_id, $date){
      
      $sql="SELECT * FROM time INNER JOIN posts ON time.post_id = posts.post_id INNER JOIN subjects ON time.subject_id = subjects.subject_id INNER JOIN login ON login.id = posts.login_id INNER JOIN users ON users.login_id = login.id WHERE posts.login_id = '$login_id' AND date = '$date'";
        // echo " ".$sql;
        $result=$this->conn->query($sql);

      $rows=array();

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;

        // return $result->fetch_assoc();
      }
    }

    public function getPosts($login_id){
      $sql="SELECT * FROM posts INNER JOIN time ON time.post_id = posts.post_id INNER JOIN subjects ON time.subject_id = subjects.subject_id INNER JOIN login ON login.id = posts.login_id INNER JOIN users ON users.login_id = login.id WHERE posts.login_id = '$login_id'";
      $result=$this->conn->query($sql);
      // echo $sql;
      $rows=array();

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }
    }

    public function getCurrentDatePosts($login_id){
      $sql="SELECT * FROM posts INNER JOIN time ON time.post_id = posts.post_id INNER JOIN subjects ON time.subject_id = subjects.subject_id WHERE posts.login_id = '$login_id' AND date = CURRENT_DATE";
      $result=$this->conn->query($sql);

      echo $sql;
      $rows=array();

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $rows[]=$row;
        }
        return $rows;
      }
    }

    
    public function getSpecificPost($id,$login_id){
      $sql="";
      $result=$this->conn->query($sql);
      if($result==false){
        die ("no record found: ".$this->conn->error);
      }else{
        return $result->fetch_assoc();
      }
    }

    public function editPost($post_id,$new_name,$new_meaning,$new_example,$new_parts_of_speech,$login_id,$new_subject_id){
      $new_example=$this->conn->real_escape_string($new_example);
      $sql = "UPDATE posts
              INNER JOIN subjects ON posts.subject_id=subjects.id 
              SET posts.post_name='$new_name',
                  posts.meaning='$new_meaning',
                  posts.example='$new_example',
                  posts.parts_of_speech='$new_parts_of_speech',
                  posts.subject_id='$new_subject_id'
              WHERE posts.post_id = '$post_id' AND posts.login_id='$login_id'
      ";
      $result=$this->conn->query($sql);
      if($result==false){
        die ("cannot update ".$this->conn->error);
      }else{
        header("location: post.php");
      }
    }

    public function deletePost($id){
      $sql="DELETE from posts WHERE id='$id'";
      $result = $this->conn->query($sql);
      if($result == false){
        die ("Cannot Delete: ".$this->conn->error);
      }else{
        header("Location:post.php");
      }
    }



  }



?>