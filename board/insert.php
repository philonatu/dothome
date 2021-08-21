<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
$conn = mysqli_connect("localhost", "philonatu", "redeast17#", "philonatu", "3307");

if(!$conn) {
  echo "DB 연결 실패". nysqli_connect_error();
} else {
  echo "DB 접속 성공\n".'<br><br>';
}

?>
<?php
  $genre = $_POST['genre'];
  $category = $_POST['category'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $site = $_POST['site'];
  $site_manager = $_POST['site_manager'];
  $pub_date = $_POST['pub_date'];
  $pub_check = $_POST['pub_check'];

// 파괴성 인젝션을 방지하기 위하여
  $genre = mysqli_real_escape_string($conn, $genre);
  $category = mysqli_real_escape_string($conn, $category);
  $title = mysqli_real_escape_string($conn, $title);
  $description = mysqli_real_escape_string($conn, $description);
  $site = mysqli_real_escape_string($conn, $site);
  $site_manager = mysqli_real_escape_string($conn, $site_manager);
  $pub_date = mysqli_real_escape_string($conn, $pub_date);
  $pub_check = mysqli_real_escape_string($conn, $pub_check);


  $query = "INSERT INTO archive(genre, category, title, description, site, site_manager, pub_date, pub_check) VALUES('$genre', '$category', '$title', '$description', '$site', '$site_manager', '$pub_date', '$pub_check')";

  echo $query.'<br><br>';

  $result = mysqli_query($conn, $query);
  if($result === false) {
    echo "저장 실패";
    error_log(mysqli_error($conn)); //에러 로그 기록
  }else {
      echo "저장 성공".'<br><br>';
  }
  mysqli_close($conn);

  print "<hr\><a href='admin.php'> 어드민 화면으로 돌아가서 또 삽입하기 </a>";

?>
<script type="text/javascript">
  location.href="admin.php";
</script>
