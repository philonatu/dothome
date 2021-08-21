<?php
  header('Content-Type:text/html; charset=utf-8');

  error_reporting(1);
  ini_set("display_errors", 1);

  $conn = mysqli_connect("localhost", "philonatu", "redeast17#", "philonatu", "3307");
  mysqli_select_db($conn, "philonatu");


  if(mysqli_connect_error()){
    echo "mysql 접속중 오류가 발생했습니다.";
    echo mysqli_connect_error();
  }
?>
