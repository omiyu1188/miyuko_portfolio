<?php
  include "../wordAction.php";
  $id=$_GET["id"];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>単語の編集</title>
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
              echo '
              <form action="" method="post">
              <div class="form-row">
                <div class="form-group col-md-12 mt-">
                  <label for="">単語</label>
                  <input type="text" class="p-2 form-control" value="'.$word_detail["word_name"].'" name="new_name">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12 mt-">
                  <label for="">意味</label>
                  <input type="text" class="p-2 form-control" value="'.$word_detail["meaning"].'" name="new_meaning">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12 mt-">
                  <label for="">例文</label>
                  <input type="text" class="p-2 form-control" value="'.$word_detail["example"].'" name="new_example">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6 mt-">
                  <label for="">品詞</label>
                  <select name="new_parts_of_speech" id="" class="form-control">
                    <option value="'.$word_detail['parts_of_speech'].'">'.$word_detail['parts_of_speech'].'</option>
                    <option value="名詞">名詞</option>
                    <option value="動詞">動詞</option>
                    <option value="形容詞">形容詞</option>
                    <option value="副詞">副詞</option>
                    <option value="助動詞">助動詞</option>
                    <option value="前置詞">前置詞</option>
                    <option value="接続詞">接続詞</option>
                    <option value="間投詞">間投詞</option>
                  </select>
                </div>

                <div class="form-group col-md-6 mt-">
                  <label for="">カテゴリー</label>
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
  <?php
  include "footer.php";
  ?>