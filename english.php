<?php
  include "container/lib01.php";
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <?php
      echo file_GET_contents("container/head.php");
    ?>
    <link rel="stylesheet" href="css/style_english.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  </head>
  <body>
    <div class="container">
      <div class="header">
        <?php
          echo file_GET_contents("container/header_for_english.php");
        ?>
      </div>
      <center>
      <div class="publications">
        <h2 text-align="center">
          Books
        </h2>
         ㆍ  Book (Korean): Philosophy of Medicine: normative and naturalistic approaches, June 1, 2020 CRI Press/Korea <br>
         ㆍ  Book (Korean Version/translation) The Age of EM by Robin Hanson, January 9, 2020 CRI Press<br>
         ㆍ  Book (Korean): Monk and Monkey: Dialog between Buddhism and Biophilosophy, October 3, 2016<br>
         ㆍ  Book (Korean): The Critical Philosophy of Life, July 21, 2016<br>
         ㆍ  Book (Korean): Philosophy of Biology, December 10, 2014<br>
         ㆍ  Book (Korean): Charles Darwin, Lighted Up By Korean Scholars, September 1, 2010<br>
         ㆍ  Book (Korean): Beyond Dichotomy, November 1, 2007<br>
         ㆍ  Book (Korean): Humanities, How to Study Them, October 1, 2003<br>
         ㆍ  Book (Korean): Scientia, July 1, 2003<br>
         ㆍ  Book (Korean): The Philosophy on Environment, September 1, 2000<br>
         ㆍ  Book (Korean Version): “A Historical Introduction to the Philosophy of Science” by John Losee, August 20, 1999<br>
         ㆍ  Book (Korean): Is the Whole More Than the Sum of Its Parts?- Modern Philosophy of Nature, February 28, 1995<br>
         ㆍ  Book (Korean Version): “Physik und Philosophie” von Werner Heisenberg, April 1, 1985
     </div>

     <div class="articles">
      <h2 text-align="center">
           Articles </h2>

       <?php
          // $dateString = date("Y-m-d", time());
          // echo $dateString;

       $page = $_GET['page'];
       $query = "SELECT * FROM archive WHERE genre = 'eng'";
       $result = mysqli_query($conn, $query);
       $total_article = mysqli_num_rows($result);

       $view_article = 20;
       if(!$page) $page=1;
       $start = ($page-1)*$view_article;

       $query = "SELECT * FROM archive WHERE genre = 'eng' ORDER BY pub_date DESC LIMIT $start, $view_article";
       mysqli_query($conn, $query);
       $result = mysqli_query($conn, $query);
       $cot = 1;
       $cot = $total_article - ($view_article * ($page-1));

       ?>

       <table>
       <?
       while($row = mysqli_fetch_assoc($result)) {
       ?>
         <tr>
           <td class="c1"> <?=($cot)?></td>
           <td class="c3"><a href="english_view.php?id=<?=$row[id]?>"><?=$row['title']?></a></td>
           <td class="c4"><?=$row['site']?></td>
           <td class="c5"><?=$row['pub_date']?></td>
         </tr>
       <?
       $cot--;
       }
       mysqli_close($conn);
       ?>
       </table>
     </div>

      <?
      include("board/page.php");
      ?>

      <div class="backtotop" style="text-align:center;">
        <a href="#top">top</a>
      </div>

      </center>
      <div class="footer">
        <div class="footer_logo">
          <img src="img/logo_text_sm.png" alt="logo letter">™
        </div>
        <div class="footer_text">
          <p>
        This web-page is made by myself without CMS-Tool.       <br>
        Copyright 2021. PHILONATU all rights reserved. ✉<a href="mailto:philonatu@gmail.com">philonatu@gmail.com </a>
          </p>
        </div>
      </div>
  </body>

</html>
