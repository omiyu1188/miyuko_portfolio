<?php
  include "../wordAction.php";

  $id=$_GET["id"];
  // $login_id=$_SESSION["login_id"];

  ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Edit Word</title>
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
    $word_detail = $word->getSpecificWord($id,$login_id);
  ?>

<div class="container-fluid mt-5">
        <div class="card mx-auto w-50 border border-0">
          <div class="card-header bg-white text-dark border-0">
            <h2 class="text-center pt-5">
              EDIT WORD
            </h2>
          </div>
          <div class="card-body">
            <?php
                  
                  // echo $id;
                 
                    echo '
                    <form action="" method="post">
                    <div class="form-row">
                      <div class="form-group col-md-12 mt-">
                        <label for="">Word</label>
                        <input type="text" class="p-2 form-control" value="'.$word_detail["word_name"].'" name="new_name">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12 mt-">
                        <label for="">Meaning</label>
                        <input type="text" class="p-2 form-control" value="'.$word_detail["meaning"].'" name="new_meaning">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12 mt-">
                        <label for="">Example</label>
                        <input type="text" class="p-2 form-control" value="'.$word_detail["example"].'" name="new_example">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6 mt-">
                        <label for="">Figure Of Speech</label>
                        <select name="new_parts_of_speech" id="" class="form-control">
                          <option value="'.$word_detail['parts_of_speech'].'">'.$word_detail['parts_of_speech'].'</option>
                          <option value="noun">Noun</option>
                          <option value="verb">Verb</option>
                          <option value="adjective">Adjective</option>
                          <option value="adverb">Adverb</option>
                          <option value="perposition">Preposition</option>
                          <option value="conjunction">Conjunction</option>
                          <option value="interjection">Interjection</option>
                        </select>
                      </div>


                      <div class="form-group col-md-6 mt-">
                        <label for="">Tag</label>
                        <select name="new_tag_id" id=""class="form-control">
                        <option value="'.$word_detail['tag_id'].'">'.$word_detail["tag_name"].'</option>';
                        ?>
                        <?php
                          include "../tagAction.php";
                          $taglist=$tag->getTags($login_id);
                          foreach($taglist as $tag){
                            $tag_id=$tag["id"];
                            echo "
                            <option value='$tag_id'>".$tag['tag_name']."</option>
                            ";
                          }
                        ?>
                        <?php
                        echo '
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12 mt-">
                        <input type="hidden" name="word_id" value="'.$word_detail["word_id"].'">
                        <input type="hidden" name="old_name" value="'.$word_detail["word_name"].'">
                        <input type="submit" class="btn btn-outline-success p-3 mt-3 form-control" name="updateWord" value="SAVE">
                      </div>
                    </div>
                    </form>
                   ';

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
