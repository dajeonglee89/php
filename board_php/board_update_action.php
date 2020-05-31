<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; chrset=UTF-8">
        <title>board_update_action.php</title>
    </head>
    <body>
        <div>board_update_action.php</div>
        <?php
            $num = $_POST["num"];
            $board_title = $_POST["board_title"];
            $board_content = $_POST["board_content"];
            echo "no : " .$num. "<br>";
            echo "title : " .$board_title. "<br>";
            echo "content : " .$board_content. "<br>";
            
        $conn = mysqli_connect("localhost", "root", "table","pw");
            if($conn){
                echo "연결 성공";
            }else{
                die("연결 실패 : " .mysqli_error());
            }

        $sql = "UPDATE board SET title='".$board_title."',content='".$board_content."',date=now() WHERE num=".$num."";
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