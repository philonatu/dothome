<?php
  include "container/lib01.php";
  include "board/config_inc.php";
  $id = $_GET['id'];
  $id = mysqli_real_escape_string($conn, $id);

  $query = "select * from archive where id='$id' order by pub_date DESC";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/style_review02.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style media="screen">
      table {
        border:0;
        width:700px;
        text-align: center;
        line-height: 200%;
      }


    </style>
  </head>
  <body>
    <center>
      <table>
        <tr>
          <td>
            <?=$row[title]?>
          </td>
        </tr>
        <tr>
          <td>
            <?=$row[description]?>
          </td>
        </tr>
      </table>
      <br><br>
      <a href="review.php">목록으로 다시가기</a>
    </center>
  </body>
