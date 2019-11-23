<?php


include "dbconn.php";



$number=$_GET['number'];

#SQL 실행하기
$sql = "select * from music_list where music_number=$number" ;
$result = $conn->query($sql);
#결과 확인하기
if($result->num_rows > 0) {

    $row = $result->fetch_assoc(); // $row는 연관배열 : (키,값) 배열
    
    echo "<script>document.location.href='".$row['lyrics']."'</script>"; 

    
   
}


?>
