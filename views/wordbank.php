<?php
include "../wordAction.php";

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
  <title>Word Bank</title>
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
<div class="container">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ADD NEW WORD
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD NEW WORD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <div class="card-header bg-white text-dark border-0">
          <h2 class="text-center pt-5">
            ADD NEW WORD
          </h2>
        </div> -->
        <div class="container">
          <form action="" method="post">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="">New Word</label>
                <input type="text" class="p-2 form-control"  name="name" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="">Meaning</label>
                <input type="text" class="p-2 form-control"  name="meaning" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
              <label for="">Example Sentence</label>
                <input type="text" class="p-2 form-control"  name="example" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              <label for="">Figure of speech</label>
                <select name="parts_of_speech" id=""class="form-control">
                  <option value=""hidden>Chose ...</option>
                  <option value="noun">Noun</option>
                  <option value="verb">Verb</option>
                  <option value="adjective">Adjective</option>
                  <option value="adverb">Adverb</option>
                  <option value="perposition">Preposition</option>
                  <option value="conjunction">Conjunction</option>
                  <option value="">
      Interjection</option>
                </select>
              </div>
            <!-- </div> -->
            <!-- <div class="form-row"> -->
              <div class="form-group col-md-6">
              <label for="">Tag</label>
                <select name="tag" id=""class="form-control">
                  <option value=""hidden>Choose ...</option>
                  <?php
                    include "../tagAction.php";
                    $login_id=$_SESSION["login_id"];
                    $taglist=$tag->getTags($login_id);
                    foreach($taglist as $tag){
                      $tag_id=$tag["id"];
                      echo "
                      <option value='$tag_id'>".$tag['tag_name']."</option>
                      ";
                    }
                  ?>
                  
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <input type="hidden" name="login_id" value="<?php echo '';?>">
                <button type="submit" class="btn btn-outline-danger p-2 form-control mt-3 p-3"  name="addWord" required>ADD NEW WORD</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<form action="" method="post">
  <?php
    include "../tagAction.php";
    $login_id=$_SESSION["login_id"];
    $taglist=$tag->getTags($login_id);
    if(empty($taglist)){
      echo "you can add tags";
    }else{
      foreach($taglist as $tag){
        $tag_id=$tag["id"];
        echo '
        <button class="btn btn-success" type="submit" value="'.$tag_id.'" name="selectTag">'.$tag['tag_name'].'</button>
        ';
      }
    }
  ?>
</form>

  <?php
    // if(isset($_POST[".$tag.['id']."])){

    // }
  ?>

    <table class="table table-hover table-striped table-bordered mx-auto my-5 ">
      <thead class="thead-dark">
        <th>No.</th>
        <th>Name</th>
        <th>Meaning</th>
        <th>Example</th>
        <th>Tag</th>
        <th></th>
      </thead>
      <tbody>
        <?php
          $login_id=$_SESSION["login_id"];
          $wordlist=$word->getWords($login_id);
          if(empty($wordlist)){
            echo "
              <tr>
                <td colspan='6' class=' text-dark'>
                You don't have any words yet.<br>
                Please push the 'ADD NEW WORD' button and you can create your own wordbank here.
                </td>
              <tr>
            ";
          }else{
            if(isset($_POST["selectTag"])){
              
              $tag_id=$_POST["selectTag"];
              $wordlist=$word->getTagWords($login_id,$tag_id);
              foreach($wordlist as $word){
                if($_POST["selectTag"]==$tag_id){
                  $wordID=$word["word_id"];
                echo "
                  <tr>
                    <td>".$word['word_id']."</td>
                    <td>".$word['word_name']." 
                    ( ".$word['parts_of_speech']." )"."</td>
                    <td>".$word['meaning']."</td>
                    <td>".$word['example']."</td>
                    <td>".$word['tag_name']."</td>
                    <td>"."<a href='wordEdit.php?id=$wordID' role='button' class='btn btn-outline-warning mr-4'>"."Edit"."</a>
                    <a href='wordDelete.php?id=$wordID' role='button' class='btn btn-outline-danger'>"."Delete"."</a>"."</td>
                  </tr>
                ";
                }
              }
              // if($word["tag_id"]==$tag_id){

              // }

              // foreach($wordlist as $word){

                // $wordID=$word["word_id"];
                // echo "
                //   <tr>
                //     <td>".$word['word_id']."</td>
                //     <td>".$word['word_name']." 
                //     ( ".$word['parts_of_speech']." )"."</td>
                //     <td>".$word['meaning']."</td>
                //     <td>".$word['example']."</td>
                //     <td>".$word['tag_name']."</td>
                //     <td>"."<a href='wordEdit.php?id=$wordID' role='button' class='btn btn-outline-warning mr-4'>"."Edit"."</a>
                //     <a href='wordDelete.php?id=$wordID' role='button' class='btn btn-outline-danger'>"."Delete"."</a>"."</td>
                //   </tr>
                // ";

              // }
            }else{
              foreach($wordlist as $word){
                $wordID=$word["word_id"];
                echo "
                  <tr>
                    <td>".$word['word_id']."</td>
                    <td>".$word['word_name']." 
                    ( ".$word['parts_of_speech']." )"."</td>
                    <td>".$word['meaning']."</td>
                    <td>".$word['example']."</td>
                    <td>".$word['tag_name']."</td>
                    <td>"."<a href='wordEdit.php?id=$wordID' role='button' class='btn btn-outline-warning mr-4'>"."Edit"."</a>
                    <a href='wordDelete.php?id=$wordID' role='button' class='btn btn-outline-danger'>"."Delete"."</a>"."</td>
                  </tr>
                ";
              }
            }
          }
        ?>
        <?php
          // $taglist=$tag->getTags();
          // foreach($taglist as $tag){
          //   $tagID=$tag["id"];

          //   echo "
          //     <tr>
          //       <td>".$tag['id']."</td>
          //       <td>".$tag['name']."</td>
          //       <td><a href='editTag.php?id=$tagID' role='button' class=' btn-outline-danger btn-outline-warning'>Edit</a></td>
          //       <td><a href='deleteTag.php?id=$tagID' role='button' name='delete' class='btn btn-outline-danger'>Delete</a></td>
          //     </tr>
          //   ";
          // }
        ?>
      </tbody>
    </table>

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
