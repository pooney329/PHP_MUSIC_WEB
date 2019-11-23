<?php

include "dbconn.php";
$no = $_GET['no'];

$sql = "delete from notice where no = $no";
if($result = $conn->query($sql)) {
    
    header("location: notice.php?page=1");
}
else {
    echo $conn->error . ":" . $sql;
}
?>

