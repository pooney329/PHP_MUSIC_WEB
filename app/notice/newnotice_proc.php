BAADp
session_start();
include_once "dbconn.php";

#데이터 읽어오기
$wdate = date("Y/m/d");
$classification = $_POST['classification'];
$content = $_POST['content'];
$title = $_POST['title'];
$uid=$_SESSION['uid'];
$sql="select * from member where uid='$uid' and admin='admin'";
if($result = $conn->query($sql)) {
   
    
$sql = "insert into notice(classification,title,content,date,admin) values('$classification','$title','$content','$wdate','$uid')";
#SQL문 실행
if($result = $conn->query($sql)) {
    echo "<script>location.href='notice.php?page=1'</script>";  // 함수호출
}
else
    echo $conn->error . ":" . $sql;



}


?>