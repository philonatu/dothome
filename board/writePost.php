<?php
include "lib02.php";

?>
<?php

//get이나 post 방식과 상관없이 값을 전달받을 수 있는 변수가 $_REQUEST[""]  이다.

  $id = $_POST['id'];
  $genre = $_POST['genre'];
  $category = $_POST['category'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $book_title = $_POST['book_title'];
  $file = $_POST['file'];
  $description = $_POST['description'];
  $site = $_POST['site'];
  $site_manager = $_POST['site_manager'];
  $pub_date = $_POST['pub_date'];
  $pub_check = $_POST['pub_check'];
  $top = $_POST['top'];


// 파괴성 인젝션을 방지하기 위하여
  $genre = mysqli_real_escape_string($conn, $genre);
  $id = mysqli_real_escape_string($conn, $id);
  $category = mysqli_real_escape_string($conn, $category);
  $title = mysqli_real_escape_string($conn, $title);
  $author = mysqli_real_escape_string($conn, $author);
  $book_title = mysqli_real_escape_string($conn, $book_title);
  $file = mysqli_real_escape_string($conn, $file);
  $description = mysqli_real_escape_string($conn, $description);
  $site = mysqli_real_escape_string($conn, $site);
  $site_manager = mysqli_real_escape_string($conn, $site_manager);
  $pub_date = mysqli_real_escape_string($conn, $pub_date);
  $pub_check = mysqli_real_escape_string($conn, $pub_check);


  $query = "select max(top) from archive where id = '$id'";
  $result = mysqli_query($query, $conn);
  $row = mysqli_fetch_array($result);

  $top = $row[0] + 1;

  if($id) {
    $query = "update archive set
    genre ='$genre',
    category = '$category',
    title = '$title',
    author = '$author',
    book_title = '$book_title',
    file = '$file',
    description = '$description',
    site = '$site',
    site_manager = '$site_manager',
    pub_date = '$pub_date',
    pub_check = '$pub_check'
    top = '$top'
    where id = '$id' ";

    mysqli_query($conn, $query);
  } else {
    $query = "INSERT INTO archive(genre, category, title, author, book_title, file, description, site, site_manager, pub_date, pub_check, top) VALUES('$genre', '$category', '$title', '$author', '$book_title', '$file', '$description', '$site', '$site_manager', '$pub_date', '$pub_check', '$top')";

    mysqli_query($conn, $query);
  }

?>
<script>
  location.href="list.php"
</script>
<script type='text/jscript' src='/Jquery-ui.js'></script>
<link rel="stylesheet" type='text/css' href='/Jquery-ui.css'/>
