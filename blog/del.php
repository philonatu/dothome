<?php
include "../board/lib02.php";
include "../board/config_inc.php";
?>
<?php
  $id = $_GET['id'];
  $id = mysqli_real_escape_string($conn, $id);

  $query = "delete from blog where id='$id' ";

  mysqli_query($conn, $query);
?>
<script>
  location.href="list.php"
</script>
