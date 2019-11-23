BAADp
session_start();
include "dbconn.php";


$i=0;
if(isset($_SESSION['uid'])){
    $uid = $_SESSION['uid'];
    if(!empty($_GET['find'])) {
        $find=$_GET['find']; 
    

        while($i<count($find)){
                $sql="insert into myplayer (uid,music_number) values('$uid',$find[$i]) ";
                if($conn->query($sql)===TRUE){ //쿼리문이작동하는지?
                $i++;
                 
                 
                }
                else{
                 
                    $i++;
                }
        }
        echo "<script>history.go(-1)</script>";   
        echo "<script>alert('재생목록에 곡이 추가되었습니다...')</script>";
         
    }
    else{
        echo "<script>alert('곡을 추가해주세요.')</script>";
        echo "<script>history.go(-1)</script>";   
    }


} else{

   echo "<script>alert('로그인을해주세요..')</script>";
     echo "<script>history.go(-1)</script>";

}
 


?>

