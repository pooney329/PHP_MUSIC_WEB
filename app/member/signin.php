BAADp
session_start();  //세션연결무조건해야지 로그인했으니

include "dbconn.php";  //db내용 가져와야지

#입력 값을 가져오기 
if(isset($_POST['uid'])){

    $uid=$_POST['uid'];
}
else {
    die("아이디가 입력되지 않았습니다");
    header("location: signin.html"); //다시돌아가자...
}
$pwd = $_POST['pwd'];
// required는 php로가지않고 브라우저가 입력값확인한다
#SQL실행하기

$sql = "select * from member where uid = '$uid' and pwd = '$pwd';";
$result =$conn->query($sql);

#결과학인하기

if($result->num_rows >0){
    $row = $result->fetch_assoc();  //검색된값이 하나 나옴, $row는 연관배열이다.
    #세션 생성하기 
    $_SESSION['uid'] = $row['uid'];
    $_SESSION['uname'] = $row['uname'];
    $_SESSION['point'] = $row['point'];
    
    echo "<script>document.location.href='test4.php'</script>"; 
    
}

    else{
        echo "<script>alert('아이디와 비밀번호가 틀립니다.BAADscript>";
        echo "<script>history.go(-1)</script>";   
        
    
    }


?>