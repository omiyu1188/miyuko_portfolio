<?php


?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sign Up</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/shards.min.css?v=3.0.0">
  <link rel="stylesheet" href="../css/shards-demo.min.css?v=3.0.0">
</head>
<body>
  <div class="container w-50">

      <div class="card mt-5">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h4 class="card-title">Miyuko</h4>
              
            </div>
            <div class="col-6 text-right">03/03/2020</div>
          </div>
          <p class="card-text mb-0"><strong>PHP: </strong>30minutes</p>
          <p class="card-text mb-0"><strong>PHP: </strong>30minutes</p>
          <p class="card-text mb-0"><strong>PHP: </strong>30minutes</p>
          <p class="card-text mt-2 border-top"><strong>TOTAL: </strong>90minutes</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Debitis, similique eum ex atque dicta alias doloribus mollitia. Rem quos dolorem!</p>
        </div>
      </div>
    <?php
      include "../postAction.php";

      $login_id = $_SESSION["login_id"];
      $datelist = $post->getDates($login_id);
      $postlist = $post->getPosts($login_id);
      

      // print_r($datelist);

      foreach($datelist as $dates){
        $post_count = $dates['post_count'];
        $date = $dates['date'];

        // echo "<br>".$post_count."=".$date;

      ?>
      <!-- START OF CARD -->
      <div class="card mt-4">
      <div class="card-header bg-white">
          <h5 class="text-right"><?php echo $date;?></h5>
      </div>
      <div class="card-body">
      <?php

        for($i = 0; $i < $post_count; $i++){
            $post_details = $post->getDatedPosts($login_id, $date);
      ?>

          <h6 class=""><span class="font-weight-bold"><?php echo $post_details[$i]['subject_name'];?>: </span><?php echo$post_details[$i]['time_hour']."hr ".$post_details[$i]['time_minute']."min";?></h6>
        
      <?php
        }
      ?>
      </div>
        <div class="card-footer border-top">
          <h6 class=""><span class="font-weight-bold">TOTAL: </span></h6>
        </div>
  
      </div>
      <!-- END OF CARD -->


      <?php
        // for($i = 0; $i < $post_count; $i++){
        //   $post_details = $post->getDatedPosts($login_id, $date);
          
        //   echo "<div class='card mt-4'>";
        //   if($post_details[$i]['subject_name'] == "HTML"){
        //     echo "<div class='card-header bg-danger text-white'>
        //     <div class='row'>
        //       <div class='col-md-6 text-left'>
        //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
        //       </div>
        //       <div class='col-md-6 text-right'>
        //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
        //       </div>
        //     </div> 
        //   </div>";
        //   }elseif($post_details[$i]['subject_name'] == "CSS"){
        //     echo "<div class='card-header bg-primary text-white'>
        //     <div class='row'>
        //       <div class='col-md-6 text-left'>
        //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
        //       </div>
        //       <div class='col-md-6 text-right'>
        //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
        //       </div>
        //     </div> 
        //   </div>";
        //   }elseif($post_details[$i]['subject_name'] == "Javascript"){
        //     echo "<div class='card-header bg-warning text-white'>
        //     <div class='row'>
        //       <div class='col-md-6 text-left'>
        //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
        //       </div>
        //       <div class='col-md-6 text-right'>
        //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
        //       </div>
        //     </div> 
        //   </div>";
        //   }elseif($post_details[$i]['subject_name'] == "PHP"){
        //     echo "<div class='card-header bg-secondary text-white'>
        //     <div class='row'>
        //       <div class='col-md-6 text-left'>
        //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
        //       </div>
        //       <div class='col-md-6 text-right'>
        //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
        //       </div>
        //     </div> 
        //   </div>";
        //   }elseif($post_details[$i]['subject_name'] == "SQL"){
        //     echo "<div class='card-header bg-info text-white'>
        //     <div class='row'>
        //       <div class='col-md-6 text-left'>
        //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
        //       </div>
        //       <div class='col-md-6 text-right'>
        //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
        //       </div>
        //     </div> 
        //   </div>";
        //   }elseif($post_details[$i]['subject_name'] == "English"){
        //     echo "<div class='card-header bg-success text-white'>
        //     <div class='row'>
        //     <div class='col-md-6 text-left'>
        //       <h5 class='text-white'>".$post_details[$i]['subject_name']."</h5>
        //     </div>
        //       <div class='col-md-6 text-right'>
        //       <h5 class='text-white'>".$post_details[$i]['date']."</h5>
        //       </div>
        //     </div> 
        //     </div>";
        //   }
        //   echo "<div class='card-body'>
        //         ".$post_details[$i]['time_hour']."h".$post_details[$i]['time_minute']."min"
        //         ."</div>
        //         </div>"
        //         ;
        // }
      }
    ?>
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
