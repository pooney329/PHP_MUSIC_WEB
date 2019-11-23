<?php

include_once "dbconn.php";

#입력양식에 입력된 데이터 가져오기
if(!empty($_POST['title'])) $title = $_POST['title'];
else die("제목 입력필드에 값이 없습니다.");
if(!empty($_POST['classification'])) $classification = $_POST['classification'];
else die("분류 입력필드에 값이 없습니다.");
if(!empty($_POST['content'])) $content = $_POST['content'];
else die("내용 입력필드에 값이 없습니다.");
$wdate = date("Y/m/d");
if(!empty($_POST['no'])) $no = $_POST['no'];
else die("no 입력필드에 값이 없습니다.");



$sql = "update notice set title = '$title', content = '$content', classification = '$classification',date='$wdate' where no='$no'";
if($result = $conn->query($sql)) {
   header("location: notice.php?page=1");
   
}
else {
    echo $conn->error . ":" . $sql;
}
?>
