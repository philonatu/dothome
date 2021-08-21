<?php
  include "lib02.php";
?>
<?php
  $id = $_GET['id'];
  $id = mysqli_real_escape_string($conn, $id);

  $query = "delete from archive where id='$id' ";

  mysqli_query($conn, $query);
?>
<script>
  location.href="list.php"
</script>

  
