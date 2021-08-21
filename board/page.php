<style type="text/css">
  .font1 a{font-family:Tahoma; font-size:12pt; color:#FFF; background:#856F5C;}

  .font2{font-family:Tahoma; font-size:12pt; color:#fff; background:#C3C2C1;}

  .font3 a{font-family:Tahoma; font-size:11pt; color:#856F5C;}

  .font4 a{font-family:Tahoma; font-size:10pt; color:#856F5C;}

  .font5{font-family:Tahoma; font-size:10pt; color:#c8c8c8;}
</style>

<?php
$total_page = ceil($total_article / $view_article);
// 페이지 인덱스의 시작과 끝 범위 - 하단표시페이지 10개씩일 경우
if($page%10) {
  $start_page = $page - $page%10+1;
} else {
  $start_page = $page - 9;
}
$end_page = $start_page + 10;


//// 그룹이동 ////

/// 이전 그룹 ////
$prev_group = $start_page - 1;
if($prev_group < 1) $prev_group=1;

////  다음 그룹 ////
$next_group = $end_page;
if($next_group > $total_page) $next_group=$total_page;

//////// 처음 페이지 /////
echo "<br>";

if($page != 1) echo "<font class='font4'><a href=$PHP_SELF?page=1>맨앞</a></font> &nbsp;";
else
  echo "<font class='font5'>맨앞</font> &nbsp;";

/// 이전 그룹이동 ////
if($page != 1) echo "<font class='font5'><a href=$PHP_SELF?page=$prev_group>바로앞</a></font> &nbsp; ";


for ($i = $start_page; $i<$end_page; $i++) {
  if($i>$total_page) break;
  if($i==$page)
    echo "(<font class='font2'>$i</font>) &nbsp;";
  else
    echo "<font class='font1'><a href=$PHP_SELF?page=$i>$i</a></font> &nbsp; ";
}
//// 다음 그룹 이동 ////
if($page != $total_page) echo " &nbsp; <font class='font5'><a href=$PHP_SELF?page=$next_group>바로뒤</a></font>";




//// 마지막 페이지 ////
if($page != $total_page) echo "&nbsp; <font class='font4'><a href=$PHP_SELF?page=$total_page>맨뒤</a></font>";
else echo "&nbsp; <font class='font5'>맨뒤</font>";
?>
