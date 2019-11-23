<?php

#세션 시작하기 
session_start();


#입력양식에 입력된 데이터 가져오기
if(!empty($_POST['uid'])) $uid = $_POST['uid'];
else {

    echo "<script>alert('uid 입력필드에 값이 없습니다.')</script>";
    
    echo "<script>document.location.href='signup.html'</script>"; 
}
if(!empty($_POST['uname'])) $uname = $_POST['uname'];
else{ 
    echo "<script>alert('uname 입력필드에 값이 없습니다.')</script>";
    
    echo "<script>document.location.href='signup.html'</script>"; 
}
if(!empty($_POST['pwd'])) $pwd = $_POST['pwd'];
else {
    echo "<script>alert('pwd 입력필드에 값이 없습니다.')</script>";
    
    echo "<script>document.location.href='signup.html'</script>"; 
}
if(!empty($_POST['telno'])) $telno = $_POST['telno'];
else{
     
     echo "<script>alert('telno 입력필드에 값이 없습니다.')</script>";
    
     echo "<script>document.location.href='signup.html'</script>"; 
}
if(!empty($_POST['addr'])) $addr = $_POST['addr'];
else {
    echo "<script>alert('addr 입력필드에 값이 없습니다.')</script>";
    
    echo "<script>document.location.href='signup.html'</script>"; 
}




include "dbconn.php"; //파일 내용을삽입  dbconn의 내용을 삽입

# INSERT 명령문 작성하기
$sql = "insert into member(uid,uname,pwd,telno,addr,point) values('$uid','$uname','$pwd','$telno','$addr',10000)";

# SQL문 실행하기
if($conn->query($sql) === TRUE) {
    //세션데이터 생성하기 
    $_SESSION['uid']=$uid;     //$uid를  uid에 저장 세션은 연관배열로 값을 저장
    $_SESSION['uname']=$uname;
    echo "<script>alert('회원가입에 성공하셨습니다.')</script>";
    echo "<script>alert('처음 10000포인트 무료제공해드립니다..')</script>";
    echo "<script>document.location.href='test4.php'</script>"; 
}
else {
echo "Error : " . $conn->error . "<br>";
echo $sql;
}


# MySQL 접속 종료
$conn->close();

?>