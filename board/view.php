<?php
  include "lib02.php";

  $id = $_GET['id'];
  $id = mysqli_real_escape_string($conn, $id);

  $query = "select * from archive where id='$id'";
  // $query = "update archive auto_increment=1";
  // $query = "SET @COUNT = 0";
  // $query = "update archive SET archive.id = @COUNT:=@COUNT+1";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);


?>

<style >
  table{
    border-collapse:collapse;
  }
</style>

<form action="writePost.php" method="post">
  <table width=1000 border="1" cellpadding=5>
    <tr>
      <th> 양식 </th>
      <td> <?=$row[genre]?> </td>
    </tr>
    <tr>
      <th> 분야 </th>
      <td> <?=$row[category]?> </td>
    </tr>
    <tr>
      <th> 제목 </th>
      <td> <?=$row[title]?> </td>
    </tr>
    <tr>
      <th> 책/논문 원저자 </th>
      <td> <?=$row[author]?> </td>
    </tr>
    <tr>
      <th>책/논문 제목 </th>
      <td> <?=$row[book_title]?> </td>
    </tr>
    <tr>
      <th> 첨부파일 </th>
      <td> <?=$row[file]?> </td>
    </tr>
    <tr>
      <th> 내용 </th>
      <td> <?=nl2br($row[description])?> </td>
    </tr>
    <tr>
      <th> 실린곳 </th>
      <td><?=$row[site]?> </td>
    </tr>
    <tr>
      <th> 실어준 곳 </th>
      <td> <?=$row[site_manager]?> </td>
    </tr>
    <tr>
      <th> 날자 </th>
      <td> <?=$row[pub_date]?> </td>
    </tr>
    <tr>
      <th> 출판여부 </th>
      <td> <?=$row[pub_check]?> </td>
    </tr>
    <tr>
      <td colspan="2">
        <div style="float:right; ">
          <a href="del.php?id=<?=$id?>" onclick="return confirm('정말 삭제할까요?')">삭제</a>
          <a href="write.php?id=<?=$id?>">수정</a>
        </div>
        <a href="list.php">목록</a>


      </td>
    </tr>
  </table>
</form>
