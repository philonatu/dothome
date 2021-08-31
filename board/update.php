<?php include "lib02.php";

$id = $_GET['id'];
$id = mysqli_real_escape_string($conn, $id);

$query = "select * from archive where id='$id' order by pub_date DESC";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<form action="updatePost.php?id=<?=$id?>" enctype="multipart/form-data" method="post">
  <!-- 아래 코드가 있어야 글쓰기와 수정을 구분할 수 있다 -->
  <input type="hidden" name="id" value="<?=$id?>">
  <table width=1000 border="1">
    <tr>
      <th> 양식 </th>
      <td>
        <input type="radio" id="book" name="genre" value="저서" <?php echo($isbook? 'checked="checked"':''); ?> >
        <label for="book">저서</label>
        <input type="radio" id="article" name="genre" value="논문" <?php echo($isarticle? 'checked="checked"':''); ?> >
        <label for="article">논문</label>
        <input type="radio" id="review" name="genre" value="서평" <?php echo($isreview? 'checked="checked"':''); ?> >
        <label for="review">서평</label>
        <input type="radio" id="book_intro" name="genre" value="책소개" <?php echo($isbook_intro? 'checked="checked"':''); ?> >
        <label for="book_intro">책소개</label>
        <input type="radio" id="article_intro" name="genre" value="논문 소개" <?php echo($isarticle_intro? 'checked="checked"':''); ?> >
        <label for="article_intro">논문 소개</label>
        <input type="radio" id="know-jockey" name="genre" value="동향" <?php echo($isknow-jockey? 'checked="checked"':''); ?> >
        <label for="know-jockey">지식 동향</label>
        <input type="radio" id="essay" name="genre" value="비평" <?php echo($isessay? 'checked="checked"':''); ?> >
        <label for="essay">비평</label>
        <input type="radio" id="lecture" name="genre" value="강의" <?php echo($islecture? 'checked="checked"':''); ?> >
        <label for="lecture">강의</label>
        <input type="radio" id="concept" name="genre" value="개념" <?php echo($isconcept? 'checked="checked"':''); ?> >
        <label for="concept">개념</label>
        <input type="radio" id="eng" name="genre" value="영문" <?php echo($isaso? 'checked="checked"':''); ?> >
        <label for="eng">영문</label>
        <input type="radio" id="aso" name="genre" value="기타" <?php echo($isaso? 'checked="checked"':''); ?> >
        <label for="aso">기타</label>
       </td>
    </tr>
    <tr>
      <th> 분야 </th>
      <td>
        <input type="radio" id="biology" name="category" value="생물">
        <label for="biology">생물학</label>
        <input type="radio" id="medicine" name="category" value="의학">
        <label for="medicine">의학</label>
        <input type="radio" id="science" name="category" value="과학">
        <label for="science">과학 일반</label>
        <input type="radio" id="humanology" name="category" value="인문">
        <label for="humanology">인문학/철학</label>
        <input type="radio" id="sociology" name="category" value="사회">
        <label for="sociology">사회/문화/환경</label>
        <input type="radio" id="intelligence" name="category" value="인지">
        <label for="intelligence">지능과 인지</label>
        <input type="radio" id="geopolitics" name="category" value="세계">
        <label for="geopolitics">세계 정황</label>
        <input type="radio" id="arts" name="category" value="그림">
        <label for="geopolitics">그림</label>
       </td>
    </tr>
    <tr>
      <th> 제목 </th>
      <td> <input type="text" name="title" value="<?=$row[title]?>" style="width:100%;"> </td>
    </tr>
    <tr>
      <th>
        (책의) 원저자
      </th>
      <td> <input type="text" name="author" value="<?=$row[author]?>"> </td>
    </tr>
    <tr>
      <th>
        책/논문 제목
      </th>
      <td> <input type="text" name="book_title" value="<?=$row[book_title]?>"> </td>
    </tr>
    <tr>
      <th> 파일 첨부 </th>
      <td>
        <input type="hidden" name="MAX_FILE_SIZE" value="300000" >
        <input type="file" name="usrfile">


        <!--<input type="submit" value="파일 올려">-->
      </td>

    </tr>

    <tr>
      <th> 내용 </th>
      <!-- 수정하면 textarea 부분이 다 없어짐 이는 큰문제 이다. 이를 반드시 해결해야 한< 해결했음 -->
      <td> <textarea name="description" value="<?=$row[description]?>" style="width:100%; height:500px;"> <?=$row[description]?>  </textarea>
      </td>
    </tr>
    <tr>
      <th> 실린곳 </th>
      <td> <input type="text" name="site" value="<?=$row[site]?>"> </td>
    </tr>
    <tr>
      <th> 실어준 곳 <br> 원본(서평) </th>
      <td> <input type="text" name="site_manager" value="<?=$row[site_manager]?>"> </td>
    </tr>
    <tr>
      <th> 날자 </th>
      <td> <input type="date" name="pub_date" value="<?=$row[pub_date]?>"> </td>
    </tr>
    <tr>
      <th> 출판여부 </th>
      <td>
        <input type="radio" id="published" name="pub_check" value="published">
        <label for="published">published</label>
        <input type="radio" id="philonatu" name="pub_check" value="philonatu">
        <label for="philonatu">philonatu</label>
        <input type="radio" id="notyet" name="pub_check" value="미공개">
        <label for="notyet">미공개</label>
       </td>
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
