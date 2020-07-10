<?php
include "../userAction.php";
$login_id=$_SESSION["login_id"];
$user_detail = $user->getSpecificUser($login_id);
?>
      <nav class="navbar navbar-expand-lg navbar-light  mb-4 sticky-top" style="background-color:rgba(106, 180, 237,0.9);">
        <ul class="nav navbar-nav">
          <li class="nav-item pr-3">
            <a href="home.php" class="btn btn-white text-primary">
            <strong>
                <i class="fas fa-book-reader"></i>
                Study Support
            </strong>
            </a>
          </li>
          <li class="pc nav-item dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Menu
             <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a  class="dropdown-item" href="wordbank.php">Word Bank</a></li>
              <li><a  class="dropdown-item"href="subject.php">科目/教材</a></li>
              <li><a  class="dropdown-item"href="todo.php">ToDo</a></li>
            </ul>
          </li>
          
        </ul>
        <ul class="nav navbar-nav ml-auto navbar-right">
          <li class="pc nav-item">
            <a href='profile.php?id=<?php echo $login_id ?>' class="nav-link ">My Page 
            </a>
          </li>
          <li class="pc nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://designrevision.com" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <img src='../upload/<?php echo $user_detail["picture"] ?>' class='img-fluid rounded-circle' style="height:23px;">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="sp dropdown-item" href="profile.php?id=<?php echo $login_id ?>">My Page</a>
              <a class="dropdown-item" href="profileEdit.php">プロフィール編集</a>
              <a class="dropdown-item" href="logout.php">ログアウト</a>
            </div>
          </li>
          <li class="sp nav-item dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Menu
             <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a  class="dropdown-item" href="wordbank.php">Word Bank</a></li>
              <li><a  class="dropdown-item"href="subject.php">科目/教材</a></li>
              <li><a  class="dropdown-item"href="todo.php">ToDo</a></li>
              <li><a  class="dropdown-item"href="profile.php?id=<?php echo $login_id ?>">My Page</a></li>
              <li><a  class="dropdown-item"href="profileEdit.php">プロフィール編集</a></li>
              <li><a  class="dropdown-item"href="logout.php">ログアウト</a></li>
            </ul>
          </li>
          <li class="pc nav-item">
            <a href="wordbank.php" class="btn btn-primary text-light" >My Wordbank</a>
          </li>
        </ul>
      </nav>
