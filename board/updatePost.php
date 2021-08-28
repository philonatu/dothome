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
  $file = $_FILES['usrfile'];
  $description = $_POST['description'];
  $site = $_POST['site'];
  $site_manager = $_POST['site_manager'];
  $pub_date = $_POST['pub_date'];
  $pub_check = $_POST['pub_check'];
  $top = $_POST['top'];

  $upload_directory = './fileUp/data/';
  $path = md5(microtime()) . '.' . $ext;
  $ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,JPG,jpeg,gif,png,PNG,txt,ppt,pptx";
  $allowed_extensions = explode(',', $ext_str);

  if(is_uploaded_file($file['tmp_name']))
  {
    $ext = end(explode('.', $file['name']));

    // 확장자 체크
    if(in_array($ext, $allowed_extensions)) {
      if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {

        $query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
        $file_id = md5(uniqid(rand(), true));
        $name_orig = $file['name'];
        $name_save = $path;

        $stmt = mysqli_prepare($conn, $query);
        $bind = mysqli_stmt_bind_param($stmt, "sss", $file_id, $name_orig, $name_save);
        $exec = mysqli_stmt_execute($stmt);

        // $query = "UPLOAD upload_file SET,
        // name_orig = ''
        // where id = '$id' ";
        // mysqli_query($conn, $query);

      }
    }
  }


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

  if(!$file_id)
  {
    $file_id = '0';
  }

  // if($id) {
    $query = "update archive set
    genre ='$genre',
    category = '$category',
    title = '$title',
    author = '$author',
    book_title = '$book_title',
    file = '{$file['name']}',
    file_id = '$file_id',
    description = '$description',
    site = '$site',
    site_manager = '$site_manager',
    pub_date = '$pub_date',
    pub_check = '$pub_check'
    where id = '$id' ";

    mysqli_query($conn, $query);

    $result = mysqli_query($conn, $query);
    if($result === false) {
      echo '수정 실패';

      //error_log(mysqli_error($conn));
      echo mysqli_error($conn);
      exit;
    } else {
      echo '수정 성공';
    }

  // } else {
  //   $query = "INSERT INTO archive(genre, category, title, author, book_title, file, file_id, description, site, site_manager, pub_date, pub_check) VALUES('$genre', '$category', '$title', '$author', '$book_title', '{$file['name']}', '$file_id', '$description', '$site', '$site_manager', '$pub_date', '$pub_check')";
  //
  //   mysqli_query($conn, $query);
  // }

  mysqli_close($conn);

?>
<script>
  location.href="list.php"
</script>
<script type='text/jscript' src='/Jquery-ui.js'></script>
<link rel="stylesheet" type='text/css' href='/Jquery-ui.css'/>
