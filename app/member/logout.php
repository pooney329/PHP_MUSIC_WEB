<?php
session_start();  
session_unset();  //세션데이터 전체 삭제
session_destroy(); //세션정보 삭제
echo "<h2>" ; //header가 동작하려면 앞에 echo가 없어야한다.
header("location: test4.php"); //페이지 이동
echo"<script>location.href='test4.php';</script>";//자바스크립트를이용한 페이지이동
echo"<script>location.replace('test4.php');</script>"; //자바스크립트를이용한 페이지이동
?>