<?php
  error_reporting(1);
  ini_set("display_errors", 1);

  $conn = mysqli_connect("localhost", "philonatu", "redeast17#", "philonatu", "3307");
  mysqli_select_db($conn, "philonatu");
  $result = mysqli_query($conn, "SELECT * FROM archive ORDER by pub_date DESC");

  if(mysqli_connect_error()){
    echo "mysql 접속중 오류가 발생했습니다.";
    echo mysqli_connect_error();
  }
  function print_title(){
    if(isset($_GET['id'])){
      echo $_GET['id'];
    } else {
      echo "philonatu";
    }
  }
?>
