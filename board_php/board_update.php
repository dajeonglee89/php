<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>board_update.php</title>
    </head>
    <body>
        <div>board_update.php</div>
        <?php 
        $conn = mysqli_connect("localhost", "root", "table","pw");
        if($conn){
            echo "연결 성공";
        }else{
            die("연결 실패 : " .mysqli_error());
        }

        $num = $_GET["num"];
        echo $num."번째 글 수정 페이지";
        $sql = "SELECT num, board_title, board_content, board_user, board_date FROM board WHERE num = '".$num."'";
        $result = mysqli_query($conn, $sql);
        if($row = mysqli_fehch_arruy($result)){
        ?>
        <form action="/board_update_action.php" method="post">
            <table>
                <tr>
                    <td>글 번호</td>
                    <td><input type="text" name="num" value="<?php echo $row["num"]?>"></td>
                </tr>
                <tr>
                    <td>글 제목</td>
                    <td><input type="text" name="board_title" value="<?php echo $row["board_title"]?>"></td>
                </tr>
                <tr>
                    <td>글 내용</td>
                    <td><input type="text" name="board_content" value="<?php echo $row["board_content"]?>"></td>
                </tr>    
            </table>

            <?php
                }
                mysqli_close($conn);
            ?>

            <button type="submit">수정하기</button>
            <a href="/board_list.php">목록가기</a>
        </form>    
        <script type="text/javascript" src="js/bootstrap.js"></script>
     
    </body>
</html>