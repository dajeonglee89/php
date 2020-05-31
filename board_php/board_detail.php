<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>board_detail.php</title>
    </head>
    <body>
        <div>board_detail.php</div>
        <?php
            $conn = mysqli_connect("localhost", "root", "table","pw");
            if($conn){
                echo "연결 성공";
            }else{
                die("연결 실패 : " .mysqli_error());
            }

            $num = $_GET["num"];
            echo $num."번째 글 내용";
            $sql = "SELECT board_no, board_title, board_content, board_user, board_date FROM board WHERE board_no = '".$board_no."'";
            $result = mysqli_query($conn,$sql);

            if($result){
                echo "조회 성공";
            }else{
                echo "결과 없음 : " .mysqli_error($conn);
            }
        ?>

        <table>
            <?php
                if($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td>작성자</td><td><?php echo $row["board_user"];?></td>                
            </tr>
            <tr>
                <td>글번호</td><td><?php echo $row["board_no"]?></td>              
                <td>글제목</td><td><?php echo $row["board_title"];?></td>              
                <td>작성일자</td><td><?php echo $row["board_date"];?></td>               
            </tr>

            <tr>
                <td colspan="6"><?php echo $row["board_content"];?></td>
            </tr>

            <?php } ?>       
        </table>
        <a href="/board_list.php">목록보기</a>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        
    </body>
</html>