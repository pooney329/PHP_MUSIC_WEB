BAADphp


if(isset($_SESSION['uid'])){
$uid=$_SESSION['uid'];
include "dbconn.php";

$sql = "select * from tiket_member where uid='$uid'";
$result = $conn->query($sql);
if($result->num_rows > 0) {


$sql = "select date from tiket_member where uid='$uid'";

$row = $result->fetch_assoc();

$startdate = date("Y-m-d h:i:s", time());  // 오늘 날짜 시간 가져옴.
$enddate = $row['date']; // 여기가 이벤트 마감일..
$timediffer=strtotime($enddate) - strtotime($startdate);   // 마감일과 오늘의 날짜 차이를 구함

    if($timediffer<0){
        $sql = "delete from tiket_member where uid='$uid' ";
        $result = $conn->query($sql);
        

    
    }
    else{
        $tiket_na=$row['tiket_name'];
    }
    


}
}
else{
    echo "<script>alert('로그인해주세요')</script>";
    echo("<script>location.href='signin.html';</script>"); 
}

// $day = floor(($timediffer)/(60*60*24));
// $hour = floor(($timediffer-($day*60*60*24))/(60*60));
// $minuBAAD floor(($timediffer-($day*60*60*24)-($hour*60*60))/(60));
// $second = $timediffer-($day*60*60*24)-($hour*60*60)-($minute*60);
// $day = floor(($timediffer)/(60*60*24))-1;

// echo "startdate :".$startdate;
// echo "<br>";
// echo "enddate :".$enddate;
// echo "<br>";

// echo $day."일 ". $hour. "시간 ". $minute. "분 ". $second. "초 남았습니다.";

// echo"$timediffer";

?>














