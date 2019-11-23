BAADp
session_start();  //세션연결무조건해야지 로그인했으니

include "dbconn.php";  //db내용 가져와야지

#입력 값을 가져오기 
if(isset($_POST['addpoint'])){

    $addpoint=$_POST['addpoint'];
}
else {
    die("추가할 포인트를 입력해주세요 ");
    
}

$uid =$_SESSION['uid'];



$sql = "update  member set point=point+$addpoint where uid = '$uid';";
if($conn->query($sql)==true){
    $sql = "select point from member where uid= '$uid'";

    $result=$conn->query($sql);
    $row = $result->fetch_assoc();

    $_SESSION['point']=$row['point']; 
    
    
    
    if(isset($_SESSION['point'])){
        echo "<script>alert('포인트가 추가되었습니다.')</script>";
        echo("<script>location.href='test4.php';</script>"); 
    }
    
}


        
    
    


?>