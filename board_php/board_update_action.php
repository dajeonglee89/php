<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; chrset=UTF-8">
        <title>board_update_action.php</title>
    </head>
    <body>
        <div>board_update_action.php</div>
        <?php
            $num = $_POST["board_no"];
            $board_title = $_POST["board_title"];
            $board_content = $_POST["board_content"];
            echo "board_no : " .$board_no. "<br>";
            echo "board_title : " .$board_title. "<br>";
            echo "board_content : " .$board_content. "<br>";
            
        $conn = mysqli_connect("localhost", "root", "table","pw");
            if($conn){
                echo "연결 성공";
            }else{
                die("연결 실패 : " .mysqli_error());
            }

        $sql = "UPDATE board SET board_title='".$board_title."',board_content='".$board_content."',date=now() WHERE board_no=".$board_no."";
        $result = mysqli_query($conn,$sql);
        
        if($result){
            echo "수정 성공 : " .$result;
        }else{
            echo "수정 실패 : " .mysqli_error($conn);
        }

        mysqli_close($conn);

        header("Location : http://localhost/board_list.php");
        ?>
    </body>
</html>