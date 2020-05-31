<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>board_add_form.php</title>
    </head>
    <body>
        <div>board_add_form.php</div>

        <form class="" action="/board_add_action.php" method="post">
            <div>
                <label>비밀번호 : </label>
                <div>
                    <input class="" name="boardPw" id="password" type="password" palceholder="Password" />
                </div>              
            </div>
            <div>
                <label class="" for="">글 제목 : </label>
                <div>
                    <input class="" name="boardTitle" id="Title" type="text" palceholder="Title" />
                </div>
            </div>
            <div>
                <label class="" for="">글내용 : </label>
                <div>
                    <textarea class="" name="boardContent" id="content" rows="10" cols="50" placeholder="Content"></textarea>
                </div>
            </div>
            <div>
                <label class="" for="">작성자 : </label>
                <div>
                    <input class="" name="boardUser" id="name" type="text" palceholder="Name" />
                </div>
            </div>

            <div>
                <button class="" type="submit" value="글입력">글입력</button>
                <button class="" type="reset" value="초기화">초기화</button>
                <button class=""><a href="/board_list.php">목록보기</a></button>
            </div>       
        </form>

        <script type="text/javascript">
            //id가 XX인 객체에 변화가 생기면 checkXX 함수를 변화된 객체의 값을 매개로 호출
            $("#password").change(function(){
                checkPassword($('#password').val());
            });
            $("#Title").change(function(){
                checkTitle($('#Title').val());
            });
            $("#content").change(function(){
                checkTitle($('#content').val());
            });
            $("#name").change(function(){
                checkName($('#name').val());
            });
            //입력된 변수의 길이를 참조하여 조건문을 통해 최소 입력 길이 유효성 검사를 하는 함수
            function checkPassword(password) { 
                if(password.length < 4) { 
                    alert("비밀번호는 4자 이상 입력하여야 합니다."); 
                    $('#password').val('').focus();
                    return false;
                } else { 
                    return true;
                } 
            } 
            
            function checkTitle(Title) {
                if(Title.length < 2) {
                    alert('제목은 2자 이상 입력해야 합니다.');
                    $('#Title').val('').focus();
 
                    return false;
                } else { 
                    return true;
                } 
            }
 
            function checkContent(content) {
                if(content.length < 2) {            
                    alert('내용은 2자리 이상 입력해야 합니다.');
                    $('#content').val('').focus();
                    return false;
                } else { 
                    return true;
                } 
            }
 
            function checkName(name) {
                if(name.length < 2) {            
                    alert('작성자명은 2자리 이상 입력해야 합니다.');
                    $('#name').val('').focus();
                    return false;
                } else { 
                    return true;
                } 
            }
        </script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>