<?php
  include "container/lib01.php";
?>
<!DOCTYPE html>
<html lang="ko">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
      echo file_GET_contents("container/head.php");
    ?>
    <link rel="stylesheet" href="css/style_blog.css">

  </head>
  <body>
    <div class="container">
      <div class="header">
        <?php
          echo file_GET_contents("container/header_for_blog.php");
        ?>
      </div>

    <br>
    </div>
    <main class="cards">

      <article class="card">
        <img src="/img/210529-2.jpg" alt="Sample photo">
        <div class="text">
          <h3>몸의 섭동</h3>
          <p>내 몸은 나만의 몸이 아니다</p>
          <button>근데 연결방법 아직 몰라</button>
        </div>
      </article>
      <article class="card">
        <img src="/img/berlin_view.jpg" alt="Sample photo">
        <div class="text">
          <h3>베를린 시내전경</h3>
          <p>베를린 돔에서 북쪽을 행햐 바라본 전경</p>
          <button>Read more</button>
        </div>
      </article>
      <article class="card">
        <img src="/img/book_biology.jpg" alt="Sample photo">
        <div class="text">
          <h3>생물철학 저서</h3>
          <p>한줄로..</p>
          <button>그것도 mysql DB로..</button>
        </div>
      </article>
      <article class="card">
        <img src="/img/book_em.jpg" alt="Sample photo">
        <div class="text">
          <h3>엠</h3>
          <p>힘들게 번역한 책, 알고보니 경제학 책,,,</p>
          <button>php로 클릭</button>
        </div>
      </article>
      <article class="card">
        <img src="/img/glider01.jpg" alt="Sample photo">
        <div class="text">
          <h3>무동력 비행기</h3>
          <p>글라이더 탑승기</p>
          <button>풀어야 할 게 정말 많군</button>
        </div>
      </article>
      <article class="card">
        <img src="/img/book_biology.jpg" alt="Sample photo">
        <div class="text">
          <h3>생물철학</h3>
          <p>설명은 짧게...</p>
          <button>설명 더...</button>
        </div>
      </article>
      <article class="card">
        <img src="/img/dom-1.jpg" alt="Sample photo">
        <div class="text">
          <h3>상수잇</h3>
          <p>상수잇정원 유리하우스보고</p>
          <button>설명 더...</button>
        </div>
      </article>
      <article class="card">
        <img src="/img/fossil01.jpg" alt="Sample photo">
        <div class="text">
          <h3>절개면</h3>
          <p>화석이 나올듯...</p>
          <button>추가설명...</button>
        </div>
      </article>
    </main>
    <div class="backtotop" style="text-align:center;">
      <a href="#top">화면 맨 위로</a>
    </div>

    <div class="footer">
      <?php
        echo file_GET_contents("container/footer.php");
      ?>
    </div>

  </body>

</html>
