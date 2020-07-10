<?php
include "../todoAction.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ToDo List</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/shards.min.css?v=3.0.0">
  <link rel="stylesheet" href="../css/shards-demo.min.css?v=3.0.0">
  <script src="https://kit.fontawesome.com/b919d7d2ee.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
    include "header.php";
  ?>
  <div class="container-fluid mt-5 w-50">
    <h2>TODO LISTS</h2><br>
    <div class="row">
      <div class="col-12">
        <form action="" method="post">
          <label for="">タスクの追加</label>
          <div class="form-row">
            <div class="form-group col-md-10">
              <input type="text" class="p-2 form-control"  name="todo_name" required>
            </div>
            <div class="form-group col-md-2">
              <input type="hidden" name="login_id" value="<?php echo '';?>">
              <button type="submit" class="btn text-white form-control" style="background-color:purple;"  name="addTodo" required>追加</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row w-50 mx-auto">
    <div class="col-12">
      <h4 class="mb-3 mt-5">CURRENT TASKS</h4>
      <table class="table table-hover  mx-auto ">
          <th>Task</th>
          <th></th>
        <tbody>
          <?php
            $login_id=$_SESSION["login_id"];
            $todolist=$todo->getTodo($login_id);
            if(empty($todolist)){

            }else{
              foreach($todolist as $todo){
                $todoID=$todo["todo_id"];
                echo "
                  <tr>
                    <td>".$todo['todo_name']."</td>
                    <td><a href='todoDelete.php?id=$todoID' role='button' class='btn text-white' style='background-color:purple;'>"."消去"."</a>"."</td>
                  </tr>
                ";
              }
            }
          ?>
        </tbody>
      </table>
    </div> 
  </div>
  <?php
  include "footer.php";
  ?>