<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>board_delete_action.php</title>
    </head>
    <body>
        <div>board_delete_action.php</div>
        <?php
            $board_no = $_POST["board_no"];
            $board_pw = $_POST["board_pw"];
            echo "board_no : " .$board_no. "<br>";
            echo "board_pw : " .$board_pw. "<br>";

        $conn = mysqli_connect("localhost", "phpboard", "board","pw");
        if($conn){
            echo "연결 성공";
        }else{
            die("연결 실패 : " .mysqli_error());
        }

        $sql = "DELETE FROM board WHERE board_pw='".$board_pw."'AND board_no=".$board_no."";

        if($result){
            echo "삭제 성공 : " .$result;
        }else{
            echo "삭제 실패 : " .mysqli_error($conn);
        }

        mysqli_close($conn);

        header("Location : http://localhost/board_list.php");
        ?>
    </body>
</html>