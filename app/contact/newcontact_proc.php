BAADp
session_start();
include_once "dbconn.php";

#데이터 읽어오기
$wdate = date("Y/m/d");
if(isset($_GET['uid'])){
$uid = $_SESSION['uid'];
}
else{
  $uid='';  
}
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];
$title = $_POST['title'];
$pwd=$_POST['pwd'];

#SQL문 작성
$sql = "insert into contact(name,email,title,message,uid,wdate,passwd) 
        values('$name','$email','$title','$msg',
                        '$uid','$wdate','$pwd')";
#SQL문 실행
if($result = $conn->query($sql)) {
    echo "<script>location.href='listcontact.php?page=1'</script>";  // 함수호출
}
else
    echo $conn->error . ":" . $sql;
?>