<?php
include "../board/lib02.php";

?>
<?php

//get이나 post 방식과 상관없이 값을 전달받을 수 있는 변수가 $_REQUEST[""]  이다.

  $id = $_POST['id'];
  $category = $_POST['category'];
  $title = $_POST['title'];
  $keyword = $_POST['keyword'];
  $description = $_POST['description'];
  $pub_date = $_POST['pub_date'];
  $file = $_FILES['usrfile'];

  $upload_directory = '../board/fileUp/data/';
  $path = md5(microtime()) . '.' . $ext;
  $ext_str = "jpg,JPG,jpeg,gif,png,PNG";
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
      }
    }
  }


// 파괴성 인젝션을 방지하기 위하여
  $id = mysqli_real_escape_string($conn, $id);
  $category = mysqli_real_escape_string($conn, $category);
  $title = mysqli_real_escape_string($conn, $title);
  $keyword = mysqli_real_escape_string($conn, $keyword);
  $description = mysqli_real_escape_string($conn, $description);
  $pub_date = mysqli_real_escape_string($conn, $pub_date);


  if(!$file_id)
  {
    $file_id = '0';
  }

  if(!$pub_date)
  {
    $pub_date = date('Ymd');
  }

  if($id) {
    $query = "update blog set
    category = '$category',
    title = '$title',
    file = '{$file['name']}',
    file_id = '$file_id',
    keyword = '$keyword',
    description = '$description',
    pub_date = '$pub_date',
    where id = '$id' ";

    mysqli_query($conn, $query);
  } else {
    $query = "INSERT INTO blog(category, title, file, file_id, keyword, description, pub_date) VALUES('$category', '$title', '{$file['name']}', '$file_id', '$keyword', '$description', '$pub_date')";

    mysqli_query($conn, $query);
  }

  echo mysqli_error($conn);

?>
<script>
  location.href="list.php"
</script>
<script type='text/jscript' src='/Jquery-ui.js'></script>
<link rel="stylesheet" type='text/css' href='/Jquery-ui.css'/>
