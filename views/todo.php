<?php
include "../todoAction.php";
// include "../userAction.php";
// $id=$_SESSION["id"];
// $row=getOneUser($id);
// $login_id=$_SESSION["login_id"];

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
</head>
<body>
<?php
    include "header.php";
  ?>
  <div class="container-fluid mt-5 w-50">
    <h2>TODO LISTS</h2><br>
    <div class="row">
      <div class="col-12">
  <!-- <div class="card mx-auto border border-0"> -->
   
    <!-- <div class="card-body"> -->
      <form action="" method="post">
        <label for="">Add New Task</label>
        <div class="form-row">
          <div class="form-group col-md-10">
            <input type="text" class="p-2 form-control"  name="todo_name" required>
          </div>
          <div class="form-group col-md-2">
            <input type="hidden" name="login_id" value="<?php echo '';?>">
            <button type="submit" class="btn text-white form-control" style="background-color:purple;"  name="addTodo" required>ADD</button>
          </div>
        </div>
      </form>
    <!-- </div> -->
  <!-- </div> -->
      </div>
      </div>
</div>
<div class="row w-50 mx-auto">
    <div class="col-12">
      <h4 class="mb-3 mt-5">CURRENT TASKS</h4>
    <table class="table table-hover  mx-auto ">
      <!-- <thead class=""> -->
        <th>No.</th>
        <th>Task</th>
        <th></th>
      <!-- </thead> -->
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
                  <td>".$todo['todo_id']."</td>
                  <td>".$todo['todo_name']."</td>
                  <td><a href='todoDelete.php?id=$todoID' role='button' class='btn text-white' style='background-color:purple;'>"."Delete Task"."</a>"."</td>
                </tr>
              ";
            }
          }
        ?>
      </tbody>
    </table>
        </div>
    


  </div>

  <!-- JavaScript -->
  <div id="fb-root"></div>
  <script>
    (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1662270373824826";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/shards.min.js"></script>
  <script src="js/demo.min.js"></script>

</body>

</html>
