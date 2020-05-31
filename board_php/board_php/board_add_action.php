<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>board_add_action.php</title>
    </head>
    <body>
        <div>board_add_action.php</div>
        <?php
            //board_add_form.php페이지에서 넘어온 글 번호값 저장 및 출력
            $board_title = $_POST["boardTitle"];
            $board_user = $_POST["boardUser"];
            $board_pw = $_POST["boardPw"];
            $board_content = $_POST["boardContent"];
            echo "board_title : " . $board_title . "<br>";
            echo "board_user : " . $board_user . "<br>";
            echo "board_pw : " . $board_pw. "<br>";
            echo "board_content : " . $board_content . "<br>";

            $conn = mysqli_connect("localhost", "root", "table","pw");
            if($conn){
                echo "연결 성공";
            }else{
                die("연결 실패 : " .mysqli_error());
            }

            $sql = "INSERT INTO board (board_title, board_user, board_pw, board_content, board_date) values ('".$board_title."','".$board_user."','".$board_pw."','".$board_content."','.now())";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "입력성공 : ".$result;
            }else{
                echo "입력실패 : ".mysqli_error($conn);
            }
            mysqli_close($conn);
            header("Location : http://localhost/board_list.php");
        ?>
        
    </body>
</html>