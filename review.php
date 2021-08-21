<?php
  include "container/lib01.php";
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <?php
      echo file_GET_contents("container/head.php");
    ?>
    <link rel="stylesheet" href="css/style_review.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  </head>
  <body>
    <div class="container">
      <div class="header">
        <?php
          echo file_GET_contents("container/header.php");
        ?>
      </div>
      <center>
      <div class="table_review">
         <h3>서평 그리고 책과 최신 논문 소개</h3>
          <?php
             $dateString = date("Y-m-d", time());
             echo $dateString;

          $page = $_GET['page'];
          $query = "SELECT * FROM archive";
          $result = mysqli_query($conn, $query);
          $total_article = mysqli_num_rows($result);

          $view_article = 20;
          if(!$page) $page=1;
          $start = ($page-1)*$view_article;

          $query = "SELECT * FROM archive ORDER BY pub_date DESC LIMIT $start, $view_article";
          mysqli_query($conn, $query);
          $result = mysqli_query($conn, $query);
          $cot = 1;
          $cot = $total_article - ($view_article * ($page-1));

          ?>
          <center>
          <table>
          <?
          while($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td class="c1"> <?=($cot)?></td>
              <td class="c2"> <?=$row['genre']?></td>
              <td class="c21"> <?=$row['category']?></td>
              <td class="c3"><a href=read.php?id=<?=$row[id]?>><?=$row['title']?></a></td>
              <td class="c4"><?=$row['author']?></td>
              <td class="c5"><?=$row['book_title']?></td>
            </tr>
          <?
          $cot--;
          }
          mysqli_close($conn);
          ?>
          </table>
        </center>
          <?
          include("board/page.php");
          ?>

      </div>
      </center>
      <div class="backtotop" style="text-align:center;">
        <a href="#top">화면 맨 위로</a>
      </div>


      <div class="footer">
        <?php
          echo file_GET_contents("container/footer.php");
        ?>
      </div>
    </div>
  </body>

</html>
