<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>board_delete_form.php</title>
</head>
    <div>board_delete_form.php</div>
    <?php
        $num = $_GET["board_no"];
        echo $num."번째 글 삭제";
    ?>
    <form action="/board_delete_action.php" mehtod="post">
        <table>
            <tr>
                <td>글 비밀번호를 입력하세요</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="board_pw">
                    <input type="hidden" name="board_no" value="<?php echo $board_no?>">
                </td>
            </tr>
            <tr>
                <td><button type="submit">글 삭제</button></td>
            </tr>
        </table>    
    </form>
    <script type="text/javascript" src="js/bootstrap.js"></script>
<body>
    
</body>
</html>