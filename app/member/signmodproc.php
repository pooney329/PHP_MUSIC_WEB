

<?php
session_start();
include "dbconn.php";


#입력양식에 입력된 데이터 가져오기
if(!empty($_POST['uid'])) $uid = $_POST['uid'];
else die("uid 입력필드에 값이 없습니다.");
if(!empty($_POST['uname'])) $uname = $_POST['uname'];
else die("uname 입력필드에 값이 없습니다.");
if(!empty($_POST['pwd'])) $pwd = $_POST['pwd'];
else die("pwd 입력필드에 값이 없습니다.");
if(!empty($_POST['telno'])) $telno = $_POST['telno'];
else die("telno 입력필드에 값이 없습니다.");
if(!empty($_POST['addr'])) $addr = $_POST['addr'];
else die("addr 입력필드에 값이 없습니다.");






$sql="update member set uname= '$uname', pwd = '$pwd',telno = '$telno', addr = '$addr' where uid = '$uid'" ;

if($result= $conn->query($sql)){
    $_SESSION['uname']=$uname; 
    echo "<script>alert('회원정보가 변경되었습니다.')</script>";
    echo"<script>document.location.href='test4.php' </script>";

}
else{
echo $conn->error . ":" . $sql;


}
?>
<body>
</html>

