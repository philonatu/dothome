<?php
  include "container/lib01.php";
?>
    <link rel="stylesheet" href="css/style_main.css">
<main class="cards">
  <?php
  $page = $_GET['page'];

  $view_article = 16;
  if(!$page) $page=1;
  $start = ($page-1)*$view_article;

  $query = "SELECT COUNT(*) as `cnt` FROM blog";
  $result = mysqli_query($conn, $query);
  $total = mysqli_fetch_array($result);

  $totalPage = ceil($total['cnt'] / $view_article);

  $query = "SELECT * FROM blog ORDER BY pub_date DESC LIMIT $start, $view_article";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
  ?>
  <article class="card">
    <?php if($row['file_id']) { ?>
    <img src="/board/fileUp/download.php?file_id=<?php echo $row['file_id']; ?>" alt="">
    <?php } ?>
    <div class="text">
      <h4><?php echo $row['title']; ?></h4>
      <p class="summary"><?php echo $row['keyword']; ?></p>
      <p class="description" style="display: none">
      <?php echo nl2br($row['description']); ?>
      </p>
      <button onclick="$(this).parent().find('.summary').hide().end().find('.description').show(); $(this).hide().next().show();" style="cursor: pointer">더읽기</button>
      <button onclick="$(this).parent().find('.summary').show().end().find('.description').hide(); $(this).hide().prev().show();" style="display: none; cursor: pointer">접기</button>
    </div>
  </article>
  <?php
  }
  ?>
</main>
