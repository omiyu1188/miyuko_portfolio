<?php
  include "../tagAction.php";

  $id=$_GET["id"];
  $tag_detail = $tag->getSpecificTag($id);
  // print_r($tag)
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Edit Tag</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/shards.min.css?v=3.0.0">
  <link rel="stylesheet" href="../css/shards-demo.min.css?v=3.0.0">
</head>
<body>

  <div class="container">
    <div class="container">

    </div>
    <div class="row mt-5">
      <div class="col-6">
        <table class="table table-striped table-bordered">
          <thead class="bg-dark text-white">
            <th>No.</th>
            <th>Name</th>
            <th></th>
          </thead>
          <tbody>
            <?php
              $taglist=$tag->getTags();
              foreach($taglist as $tag){
                $tagID=$tag["id"];
                
                echo "
                <tr>
                <td>".$tagID."</td>
                <td>".$tag['tag_name']."</td>
                <td>
                <form method='post' style='display:inline-block;'>
                <a href='tagEdit.php?id=$tagID' type='submit' role='button' name='editTag' class='btn btn-outline-warning mr-3' type='submit'>Edit</a>
                </form>
                <a href='deleteTag.php?id=$tagID' role='button' name='delete' class='btn btn-outline-danger'>Delete</a></td>
                </tr>
                ";
              }
              ?>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <div class="card mx-auto border border-0">
          <div class="card-header bg-white text-dark border-0">
            <h2 class="text-center pt-5">
              EDIT TAGS
            </h2>
          </div>
          <div class="card-body">
            <?php
                  
                  // echo $id;
                  foreach($tag_detail as $detail){
                    echo '
                    <form action="" method="post">
                    <div class="form-row">
                      <div class="form-group col-md-12 mt-3">
                        <input type="text" class="p-3 form-control" placeholder="'.$detail["tag_name"].'" name="new_name">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12 mt-3">
                        <input type="hidden" name="tag_id" value="'.$detail["id"].'">
                        <input type="hidden" name="old_name" value="'.$detail["tag_name"].'">
                        <input type="submit" class="btn btn-outline-success p-3 form-control" name="updateTag" value="SAVE">
                      </div>
                    </div>
                    </form>
                   ';
                  }
              ?>
          </div>
        </div>
      </div>
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
