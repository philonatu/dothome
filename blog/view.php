<?php
include "../board/lib02.php";
include "../board/config_inc.php";

  $id = $_GET['id'];
  $id = mysqli_real_escape_string($conn, $id);

  $query = "select * from blog where id='$id'";
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
      <th> 분야 </th>
      <td> <?=$row[category]?> </td>
    </tr>
    <tr>
      <th> 제목 </th>
      <td> <?=$row[title]?> </td>
    </tr>
    <tr>
      <th> 키워드 </th>
      <td> <?=$row[keyword]?> </td>
    </tr>
    <tr>
      <th> 첨부파일 </th>
      <td>
        <?php
        if($row['file_id'])
        {
          $query = "SELECT `file_id`, `name_orig` FROM `upload_file` WHERE `file_id` = ?";

          if($stmt = mysqli_prepare($conn, $query))
          {
            mysqli_stmt_bind_param($stmt, "s", $row['file_id']);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $file_id, $name_orig);
            while (mysqli_stmt_fetch($stmt)) {
              if(preg_match('/\.(gif|jpe?g|png)$/i', $name_orig))
              {
                echo sprintf('<img src="/board/fileUp/download.php?file_id=%s" style="max-width: %s; height: auto"><br>', $file_id, '600px');
              }
              printf ('<a href="/board/fileUp/download.php?file_id=%s">%s</a><br>', $file_id, $name_orig);
            }

            mysqli_stmt_close($stmt);
          }
        }
        ?>
      </td>
    </tr>
    <tr>
      <th> 내용 </th>
      <td> <?=nl2br($row[description])?> </td>
    </tr>

    <tr>
      <th> 날자 </th>
      <td> <?=$row[pub_date]?> </td>
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
