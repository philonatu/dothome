<?php
  include "container/lib01.php";
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
    <link rel="stylesheet" href="css/style_jockey.css">

  </head>
  <body>
    <div class="container">
      <div class="header">
        <?php
          echo file_GET_contents("container/header.php");
        ?>
      </div>
      <div class="main">
        <div class="table_jockey">
         <h3>책을 소개합니다.</h3>
          <?php
          $conn = mysqli_connect("localhost", "philonatu", "tundra55" , "philonatu", "3307");
          mysqli_select_db($conn, "philonatu");
          $result = mysqli_query($conn, "SELECT * FROM archive");
          echo "<table>";
          while($row = mysqli_fetch_assoc($result)){
            echo
              '<tr>
              <td class="c1">' . $row['id'] . '</td>' .
              '<td class="c2">' . $row['genre'] . '</td>' .
              // 장르가 서평인 경우에만 select되도록 한다.

              '<td class="c3">' . $row['title'] . '</td>'.
              '<td class="c4">' . $row['site'] . '</td>' .
              '<td class="c5">' . $row['pub_date'] . '</td>
              </tr>';
          }
          echo "</table>";
          mysqli_close($conn);
          ?>
        </div>
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
