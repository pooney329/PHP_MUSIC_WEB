<?php
#MySQL 데이터베이스 접속 정보 설정
$server = "localhost"; # MySQL 서버가 동작중인 컴퓨터이름 또는 ip 주소
$account = "root"; # MySQL 계정
$password = "";
$dbname = "music";

#MySQL 서버에 접속하기
$conn = new mysqli($server,$account,$password,$dbname);
if($conn->connect_error) {
die("접속오류 : " . $conn->connect_error);
}
?>