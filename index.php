<?php
  include "container/lib01.php";
?>
<!doctype html>
<html lang="ko">
  <head>
    <?php
      echo file_GET_contents("container/head.php");
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_main.css">      
  </head>

  <body>
    <div class="container">
      <div class="header">
        <?php
          echo file_GET_contents("container/header.php");
        ?>
      </div>

      <div>
        <?php
          echo file_GET_contents("container/main.php");
        ?>
      </div>
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
