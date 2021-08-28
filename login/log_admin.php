<?php
  session_start();
  require_once('login/config.php');
  require_once('login/log_functions.php');

  ensure_user_is_authenticated();

  echo $_SESSION['email'];
  include('log_header.php');
?>
<a href="logout.php">logout</a>

<?php include('footer.php'); ?>
