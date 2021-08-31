<?php
include "../board/lib02.php";

?>
<?php

//get이나 post 방식과 상관없이 값을 전달받을 수 있는 변수가 $_REQUEST[""]  이다.

  $id = $_POST['id'];
  $category = $_POST['category'];
  $title = $_POST['title'];
  $file = $_FILES['usrfile'];
  $description = $_POST['description'];
  $keyword = $_POST['keyword'];
  $pub_date = $_POST['pub_date'];

  $upload_directory = '/board/fileUp/data/';
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
      }
    }
  }


// 파괴성 인젝션을 방지하기 위하여

  $id = mysqli_real_escape_string($conn, $id);
  $category = mysqli_real_escape_string($conn, $category);
  $title = mysqli_real_escape_string($conn, $title);
  $file = mysqli_real_escape_string($conn, $file);
  $description = mysqli_real_escape_string($conn, $description);
  $keyword = mysqli_real_escape_string($conn, $keyword);
  $pub_date = mysqli_real_escape_string($conn, $pub_date);

  $query = "select max(top) from blog where id = '$id'";
  $result = mysqli_query($query, $conn);
  $row = mysqli_fetch_array($result);

  $top = $row[0] + 1;

  if(!$file_id)
  {
    $file_id = '0';
  }


    $query = "update blog set
    category = '$category',
    title = '$title',
    file = '{$file['name']}',
    file_id = '$file_id',
    description = '$description',
    keyword = '$keyword',
    pub_date = '$pub_date',
    where id = '$id' ";

    mysqli_query($conn, $query);

    $result = mysqli_query($conn, $query);
    if($result === false) {
      echo '수정 실패';
      echo mysqli_error($conn);
      exit;
    } else {
      echo '수정 성공';
    }


  mysqli_close($conn);

?>
<script>
  location.href="list.php"
</script>
<script type='text/jscript' src='/Jquery-ui.js'></script>
<link rel="stylesheet" type='text/css' href='/Jquery-ui.css'/>
