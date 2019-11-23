<?php session_start(); ?>
<?php
$uid=$_SESSION['uid'];
include "dbconn.php";


$sqla="select * from tiket_member where uid='$uid'";    
$result = $conn->query($sqla);
if($result->num_rows <= 0) {
        $sqla="select point from member where uid='$uid'";
        
        $result = $conn->query($sqla);
        $row=$result->fetch_assoc();
        if($row['point']>=20000){
    



$sql = "update member set point=point-20000 where uid='$uid'";

$result = $conn->query($sql);



$enddate = date("Y-m-d h:i:s", strtotime("+1 months"));

$sql = "insert into tiket_member values('$uid','30일권','$enddate')";

$result = $conn->query($sql);



echo "<script>alert('30일 이용권구매 하셨습니다. 남은 일수는 나의정보에서 확인해주세요.')</script>";
echo"<script>document.location.href='test4.php' </script>";
}
else{

    echo "<script>alert('포인트가 부족합니다..')</script>";
    echo "<script>history.go(-1)</script>";   
    
}
}

else{
    
    echo "<script>alert('이미 이용권이 존재합니다..')</script>";
    echo "<script>history.go(-1)</script>";   
}
?>