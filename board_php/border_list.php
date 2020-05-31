<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>board_list.php</title>
  </head>
  <body>
    <div>board리스트</div>

    <?php
      $currentPage = 1;
      if(isset($_GET["currentPage"])){
        $currentPage = $_GET["currentPage"];
      }
      //mysqli_connect()함수로 커넥션 객체 생성
      $conn = mysqli_connect("localhost", "root", "table","pw");
      if($conn){
        echo "연결 성공";
      }else{
        die("연결 실패 : " .mysqli_error());
      }

      // 테이블 내 전체 행 갯수 조회 
      $sqlCount = "SELECT count(*) FROM board";
      $resulCount = mysqli_query($conn, $sqlCount);
      if($rowCount = mysqli_fetch_array($resultCount)){
        $totalRowNum = $rowCount["count(*)"];
      }

      //행 갯수 조회 쿼리 실행여부 확인 
      if($resultCount){
        echo "조회 성공 : " . $totalRowNum."<br>";
      }else{
        echo "결과 없음 : " .mysqli_error($conn);
      }

      $rowPerPage = 10; // 각 페이지 게시물 수 
      $begin = ($currentPage - 1) * $rowPerPage;
      $sql = "SELECT board_num, board_title, board_user, board_date FROM board order by board_no desc limit ".$begin.",".$rowPerPage."";
      $resut = mysql_query($conn, $sql);
      if($result){
        echo "조회 성공";
      }else{
        echo "결과 없음 : " . mysqli_error($conn);
      }
    ?>

    <table>
      <tr>
        <td>no</td>
        <td>title</td>
        <td>작성자</td>
        <td>작성일</td>
        <td>수정</td>
        <td>삭제</td>
      </tr>

      <?php
        while($row = mysqli_fetch_array($result)){
      ?>
      <tr>
        <td><?php echo $row["board_no"];?></td>
        <td>
          <?php 
            echo "<a href='/board_detail.php?num=".$row["board_no"]."'>";
            echo $row["board_title"];
            echo "</a>";
          ?>
        </td>
        <td><?php echo $row["board_user"];?></td>
        <td><?php echo $row["board_date"];?></td>

        <?php
          echo "<td><a href='/board_update_form.php?num=".$row["board_no"]."'>수정</a></td>";
          echo "<td><a href='/board_delete_form.php?num=".$row["board_no"]."'>삭제</a></td>"
        ?>
      </tr>
        <?php } ?>
    </table>
    <?php 
      if($currentPage > 1){
        echo "<a href='/board_list.php?currentPage=".($currentPage-1)."'>이전</a>"; //이전 버튼, 클릭될때 currentPage변수 값에 1을 뺀값이 넘어감 
      }

      $lastPage = ($totalRowNum-1) / $rowPerPage;

      if(($totalRowNum-1) % $rowPerPage !=0){
        $lastPage += 1;
      }

      if($currentPage < $lastPage){
        echo"<a href='/board_list.php?currentPage=".($currentPage+1)."'>다음</a>";
      }
      mysqli_close($conn);
    ?>  
    
    <a href="/board_add_form.php">글쓰기</a>
    <script type="text/javascript" src="js/bootstrap.js"></script>

  </body>
</html>

