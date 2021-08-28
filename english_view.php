<?php
  include "container/lib01.php";

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
  <div align=center>
  <table width=auto border="0" cellpadding=5 align=center>

    <tr align=center>
      <td> <?=$row[title]?> </td>
    </tr>
    <tr align=center>
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
              // printf ('<a href="/board/fileUp/download.php?file_id=%s">%s</a><br>', $file_id, $name_orig);
            }

            mysqli_stmt_close($stmt);
          }
        }
        ?>
      </td>
    </tr>
    <tr >
      <td> <?=nl2br($row[description])?> </td>
    </tr>
  

  </table>
</div>
  <br>
    <div align=center>
      <a href="javascript:history.back()" class="btn btn-primary">목록으로 돌아가기</a>
    </div>




</form>
