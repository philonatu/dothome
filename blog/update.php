<?php include "../board/lib02.php";

$id = $_GET['id'];
$id = mysqli_real_escape_string($conn, $id);

$query = "select * from blog where id='$id' order by pub_date DESC";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<form action="updatePost.php?id=<?=$id?>" enctype="multipart/form-data" method="post">
  <!-- 아래 코드가 있어야 글쓰기와 수정을 구분할 수 있다 -->
  <input type="hidden" name="id" value="<?=$id?>">
  <table width=1000 border="1">
    <tr>
      <th> 제목 </th>
      <td> <input type="text" name="title" value="<?=$row[title]?>" style="width:100%;"> </td>
    </tr>
    <tr>
      <th> 분야 </th>
      <td>
        <input type="radio" id="main" name="category" value="main">
        <label for="main">메인페이지</label>
        <input type="radio" id="arts" name="category" value="arts">
        <label for="arts">도구와 그림</label>
        <input type="radio" id="history" name="category" value="history">
        <label for="history">비평과 역사</label>
        <input type="radio" id="science" name="category" value="science">
        <label for="science">자연과 과학</label>
        <input type="radio" id="concept" name="category" value="concept">
        <label for="concept">개념페이지</label>
       </td>
    </tr>
    <tr>
      <th> 파일 첨부 </th>
      <td>
        <input type="hidden" name="MAX_FILE_SIZE" value="300000" >
        <input type="file" name="usrfile">
      </td>
    </tr>
    <tr>
      <th> 키워드 <br> (영문/개념페이지) </th>
      <td> <input type="text" name="keyword" value="<?=$row['keyword']?>" style="width: 100%">
      </td>
    </tr>
    <tr>
      <th> 내용 </th>
      <td> <textarea name="description" value="<?=$row[description]?>" style="width:100%; height:500px;"> <?=$row[description]?>  </textarea>
      </td>
    </tr>
    <tr>
      <th> 날자 </th>
      <td> <input type="date" name="pub_date" value="<?=$row[pub_date]?>"> </td>
    </tr>
    <tr>
      <td colspan="2">
        <div style="text-align:center;">
          <input type="submit" value="저장">
        </div>
      </td>
    </tr>
  </table>
</form>
