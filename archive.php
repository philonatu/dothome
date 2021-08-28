<?php

  include "board/lib02.php";
  include "board/config_inc.php";
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <?php
      echo file_GET_contents("container/head.php");
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style_archive.css?after" type="text/css">

  </head>
  <body>
    <div class="container">
      <div class="header">
        <?php
          echo file_GET_contents("container/header.php");
        ?>
      </div>

      <div class="main">
        <?php
        $page = $_GET['page'];

        $query = "SELECT * FROM archive";
        $result = mysqli_query($conn, $query);
        $total_article = mysqli_num_rows($result);

        $view_article = 15;
        if(!$page) $page=1;
        $start = ($page-1)*$view_article;

        ?>
        <div class="archive_info">
          <p>
          <?php
                   echo "- ".strftime('%Y년 %m월 %d일'). "까지 시험삼아 등록한 데이터 전체 갯수는 ".$total_article."개 입니다. <br><br> 여기 올라온 자료 리포트row는 테스트 삼아 올린 것입니다. 진짜 데이터는 아직 올리지 못했습니다.<br><br> mysql 데이터베이스 이전migration 하는 방법을 더 배워야 하거든요. 곧 올라옵니다. ";
          ?>
          </p>

        </div>

        <div class="archive_list">
          <?php
          $query = "SELECT * FROM archive ORDER BY pub_date DESC LIMIT $start, $view_article";
          mysqli_query($conn, $query);
          $result = mysqli_query($conn, $query);
          $cot = 1;
          $cot = $total_article - ($view_article * ($page-1));


            while($row = mysqli_fetch_array($result)){
              echo nl2br('
                  <ol class="c0">
                    <li class="c1">' .($cot). '</li> '.
                    '<li class="c2">' .$row['genre']. '</li> ' .
                    // '<li class="c3"> <a href="../archive.php?id=<?=$row[description]>">'
                    '<li class="c3"> <a href="archive_view.php?id=' . $row['id'] . '">'.$row['title'].'</a></li>' .
                    '<li class="c4">' .$row['site']. '</li> ' .
                    '<li class="c5">' .$row['pub_date']. '</li></ol>');


            // while($row = mysqli_fetch_array($result)) {
            // echo $cot.".&nbsp;".$row['genre']."&nbsp;/".$row['category']."&nbsp; <a href=".$row['description'].">".$row['title']."</a> &nbsp;".$row['pub_date']."<br>";

            $cot--;
            }
            ?>
            <br>
            <center>
            <?php
            include("board/page.php");
            ?>
            </center>

        </div>

      </div>
      <center>
      <div class="backtotop">
        <br>
        <a href="#top">화면 맨 위로</a>
        <br><br>
      </div>
      </center>
      <div class="footer">
        <?php
          // echo file_GET_contents("../container/footer.php");
          include "container/footer.php";
        ?>
      </div>

  </body>

</html>
