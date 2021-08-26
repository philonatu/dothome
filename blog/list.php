<?php
include "../board/lib02.php";
include "../board/config_inc.php";

// 아래처럼 GET으로 가져오는 변수처리하지 않으면 php_self 변수가 작동안됨.
$page = $_GET['page'];

$query = "SELECT * FROM blog";
$result = mysqli_query($conn, $query);
$total_article = mysqli_num_rows($result);
echo "전체 레코드 갯수:".$total_article;
echo "<br>";

$view_article = 20;
if(!$page) $page=1;
$start = ($page-1)*$view_article;

?>



<style >
  table{border-collapse:collapse;}
</style>

<center>
  <p>
    전체 데이타 갯수는 <? echo $total_article; ?> 개이며, 한 페이지에 <? echo $view_article?> 개씩 보여집니다.
  </p>
<table width=1000 border="1">
  <tr>
    <th width=20> No </th>
    <th> 분야 </th>
    <th> 제목 </th>
    <th> 키워드 </th>

    <th width=85> 날자 </th>
  </tr>
  <?php
  $query = "SELECT * FROM blog ORDER BY pub_date DESC LIMIT $start, $view_article";
  mysqli_query($conn, $query);
  $result = mysqli_query($conn, $query);
  $cot = 1;
  $cot = $total_article - ($view_article * ($page-1));
  while($row = mysqli_fetch_array($result)) {
  ?>

  <tr>
    <td> <?=$cot?></td>
    <td><?=$row['category']?></td>
    <td> <a href="view.php?id=<?=$row[id]?>"><?=$row[title]?></a> </td>
    <td><?=$row['keyword']?></td>

    <td> <?=substr($row[pub_date], 0, 10)  ?></td>
  </tr>
<?
$cot--;

}
?>

</table>

<?php
include("../board/page.php");
?>

</center>
<a href="write.php">글쓰기</a>
