<?php
include "../wordAction.php";
include "../tagAction.php";
$login_id=$_SESSION["login_id"];
$taglist=$tag->getTags($login_id);
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
  <script src="https://kit.fontawesome.com/b919d7d2ee.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
    include "header.php";
  ?>

<div class="row mx-3">
  <div class="col-md-3">
    <div class="container">
      <div class="">
        <?php 
          if(isset($taglist)):
        ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          新しい単語を追加！
        </button>
        <?php endif; ?>

      <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新しい単語の追加</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <form action="" method="post">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="">単語</label>
                        <input type="text" class="p-2 form-control"  name="name" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="">意味</label>
                        <input type="text" class="p-2 form-control"  name="meaning" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                      <label for="">例文</label>
                        <input type="text" class="p-2 form-control"  name="example" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                      <label for="">品詞</label>
                        <select name="parts_of_speech" id=""class="form-control">
                          <option value=""hidden>Chose ...</option>
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
                      <div class="form-group col-md-6">
                      <label for="">カテゴリー</label>
                        <select name="tag" id=""class="form-control">
                          <option value=""hidden>Choose ...</option>
                          <?php
                            foreach((array)$taglist as $tag){
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
                        <button type="submit" class="btn btn-outline-danger p-2 form-control mt-3 p-3"  name="addWord" required>追加する</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="">
        <form action="" method="post">
          <button type="submit" name="clear" class='btn btn-sm btn-outline-danger mt-4 mb-1'>条件をクリア</button>
        </form>                   
        <form action="" method="post">
          <div class="form-row">
            <div class="form-group col-md-12 m-0">
              <label class="w-100 border-bottom">カテゴリーで絞る
          <a href='tag.php' class=''><span class="text-secondary">(</span> カテゴリーを追加 >> <span class="text-secondary">)</span></a>
              </label>
            </div>
          </div>
          <?php
              foreach((array)$taglist as $tag){
                $tag_id=$tag["id"];
                echo '
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <button class="btn text-secondary p-0" type="submit" value="'.$tag_id.'" name="selectTag">'.$tag['tag_name'].'</button>
                  </div>
                </div>
                ';
              }
          ?>
        </form>

        <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-12 m-0">
              <label class="border-bottom w-100">品詞で絞る</label>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 ">
              <button role="button" class="btn text-secondary p-0" type="submit" value="名詞" name="select_parts_of_speech">名詞</button>  
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <button role="button" class="btn text-secondary p-0" type="submit" value="動詞"name="select_parts_of_speech">動詞</button>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <button role="button" class="btn text-secondary p-0" type="submit" value="形容詞"name="select_parts_of_speech">形容詞</button>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <button role="button" class="btn text-secondary p-0" type="submit" value="副詞"name="select_parts_of_speech">副詞</button>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <button role="button" class="btn text-secondary p-0" type="submit" value="助動詞"name="select_parts_of_speech">助動詞</button>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <button role="button" class="btn text-secondary p-0" type="submit" value="前置詞"name="select_parts_of_speech">前置詞</button>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <button role="button" class="btn text-secondary p-0" type="submit" value="接続詞"name="select_parts_of_speech">接続詞</button>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <button role="button" class="btn text-secondary p-0" type="submit" value="間投詞"name="select_parts_of_speech">間投詞</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <table class="table table-hover table-striped table-bordered mx-auto my-5 ">
      <thead class="thead-dark">
        <th>英単語</th>
        <th>意味</th>
        <th>例文</th>
        <th>カテゴリー</th>
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
                まだ単語がありません！<br>
                ①<a href='tag.php'>カテゴリーを追加する</a>。（日常会話、イディオム、etc...）<br>
                ②左上の”新しい単語を追加！”から単語を追加する
                </td>
              <tr>
            ";
          }else{
            if(isset($_POST["selectTag"])){
              $tag_id=$_POST["selectTag"];
              $wordlist=$word->getTagWords($login_id,$tag_id);
              foreach((array)$wordlist as $word){
                if($_POST["selectTag"]==$tag_id){
                  $wordID=$word["word_id"];
                echo "
                  <tr>
                    <td>".$word['word_name']." 
                    ( ".$word['parts_of_speech']." )"."</td>
                    <td>".$word['meaning']."</td>
                    <td>".$word['example']."</td>
                    <td>".$word['tag_name']."</td>
                    <td>"."<a href='wordEdit.php?id=$wordID' role='button' class='btn btn-outline-warning mr-4'>"."編集"."</a>
                    <a href='wordDelete.php?id=$wordID' role='button' class='btn btn-outline-danger'>"."消去"."</a>"."</td>
                  </tr>
                ";
                }
              }
            }elseif(isset($_POST["select_parts_of_speech"])){
              $specific_parts_of_speech=$_POST["select_parts_of_speech"];
              $wordlist=$word->getPartsOfSpeechWords($login_id,$specific_parts_of_speech);
              foreach((array)$wordlist as $word){
                if($_POST["select_parts_of_speech"]==$specific_parts_of_speech){
                  $wordID=$word["word_id"];
                echo "
                  <tr>
                    <td>".$word['word_name']." 
                    ( ".$word['parts_of_speech']." )"."</td>
                    <td>".$word['meaning']."</td>
                    <td>".$word['example']."</td>
                    <td>".$word['tag_name']."</td>
                    <td>"."<a href='wordEdit.php?id=$wordID' role='button' class='btn btn-outline-warning mr-4'>"."編集"."</a>
                    <a href='wordDelete.php?id=$wordID' role='button' class='btn btn-outline-danger'>"."消去"."</a>"."</td>
                  </tr>
                ";
                }
              }
            }elseif(isset($_POST["clear"])){
              foreach((array)$wordlist as $word){
                $wordID=$word["word_id"];
                echo "
                  <tr>
                    <td>".$word['word_name']." 
                    ( ".$word['parts_of_speech']." )"."</td>
                    <td>".$word['meaning']."</td>
                    <td>".$word['example']."</td>
                    <td>".$word['tag_name']."</td>
                    <td>"."<a href='wordEdit.php?id=$wordID' role='button' class='btn btn-outline-warning mr-4'>"."編集"."</a>
                    <a href='wordDelete.php?id=$wordID' role='button' class='btn btn-outline-danger'>"."消去"."</a>"."</td>
                  </tr>
                ";
              }
            }else{
              foreach((array)$wordlist as $word){
                $wordID=$word["word_id"];
                echo "
                  <tr>
                    <td>".$word['word_name']." 
                    ( ".$word['parts_of_speech']." )"."</td>
                    <td>".$word['meaning']."</td>
                    <td>".$word['example']."</td>
                    <td>".$word['tag_name']."</td>
                    <td>"."<a href='wordEdit.php?id=$wordID' role='button' class='btn btn-outline-warning mr-4'>"."編集"."</a>
                    <a href='wordDelete.php?id=$wordID' role='button' class='btn btn-outline-danger'>"."消去"."</a>"."</td>
                  </tr>
                ";
              }
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
