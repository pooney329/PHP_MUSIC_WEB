<?php

include "dbconn.php";
$no = $_GET['no'];

$sql = "delete from contact where no = $no";
if($result = $conn->query($sql)) {
    
    header("location: listcontact.php?page=1");
}
else {
    echo $conn->error . ":" . $sql;
}
?>

