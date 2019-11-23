BAADp session_start(); ?>
<?php
$i=0;
include "dbconn.php";
$uid=$_SESSION['uid'];
$music_number=$_GET['find'];

if(isset($_GET['frquentlydate'])){

    $frquentlydate=$_GET['frquentlydate'];
}
else{
    $frquentlydate=-1;
    
}



if(isset($_GET['countmusic'])){

    $countmusic=$_GET['countmusic'];
}
else{
    $countmusic=-1;
    
}





    if($frquentlydate==1){
        while($i<count($music_number)){
        $sql="update frequentlymusic set date='' where uid='$uid' and music_number=$music_number[$i] ";
        $conn->query($sql);

        $i++;
        }
        echo "<script>document.location.href='frequentlydatemusic.php?page=1&freday=15' </script>"; 
    }
    
    else if( $countmusic==2){

        while($i<count($music_number)){
            $sql="update frequentlymusic set count=0 where uid='$uid' and music_number=$music_number[$i] ";
            $conn->query($sql);
    
            $i++;
            }
            echo "<script>document.location.hrefBAADuntmusic.php?page=1' </script>"; 
        }


    
    
    else{

        while($i<count($music_number)){
        $sql="delete from myplayer where uid='$uid' and music_number=$music_number[$i] ";
        $conn->query($sql);

        $i++;
        }
        echo "<script>document.location.href='myplaylist.php?page=1' </script>"; 
    }


?>