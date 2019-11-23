<?php session_start(); ?>

<!DOCTYPE html>

<html>

<head>

    <title></title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>

    * {

        box-sizing: border-box;

    }

    body {

        width: 600px;

        margin-left: auto;

        margin-right: auto;

    }

    input[type=text], select, textarea {

        width: 100%;

        padding: 12px;

        border: 1px solid #ccc;

        border-radius: 4px;

        resize: vertical;

    }
    input[type=text]: read-only {
        background: #ccc;
    }
 

    label {

        padding: 12px 12px 12px 0;

        display: inline-block;

    }

 

    input[type=submit],button {

        background-color: #4CAF50;

        color: white;

        padding: 12px 20px;

        border: none;

        border-radius: 4px;

        cursor: pointer;

        float: right;
        margin :5px;

    }

 

    input[type=submit]:hover,button:hover {

        background-color: #45a049;

    }

 

    .container {

        border-radius: 5px;

        background-color: #f2f2f2;

        padding: 20px;

    }

 

    .col-25 {

        float: left;

        width: 25%;

        margin-top: 6px;

    }

 

    .col-75 {

        float: left;

        width: 75%;

        margin-top: 6px;

    }

 

    /* Clear floats after the columns */

    .row:after {

        content: "";

        display: table;

        clear: both;

    }

    </style>

    </head>
    
    <script>
        function open_win()
{
 window.open('mp3_player.php','popup', 'width=500%, height=500%, left=0, top=0, toolbar=no, location=no, directories=no, status=no, menubar=no, resizable=no, scrollbars=no, copyhistory=no');
}





    </script>


    <body>
      
    
<?php



include "date.php";
include "dbconn.php";
$i=0;
$b="안녕하세요";

$array=array();



if(!isset($tiket_na)){
    $tiket_na='존재하지않음';

}





if($tiket_na !== "30일권"){
 
    if(!empty($_GET['find'])) {
        

        $find = $_GET['find'];
          if(!is_array($find)){
            $find=array($find);
          }
            
        


        $count=count($find);

        $sqla="select point from member where uid='$uid'";
        
            $result = $conn->query($sqla);
            $row=$result->fetch_assoc();
        
            
        $price=100;
        $discount=$price*$count;

        
                if($row['point']>=$discount){
                        
                    $sqlb="update member set point=point-$discount  where uid='$uid';";
                    $conn->query($sqlb);

                    $sql = "select point from member where uid= '$uid'";

                    $result=$conn->query($sql);
                    $row = $result->fetch_assoc();

                    $_SESSION['point']=$row['point']; 

                    
                    while($i<count($find)){
                        $sql="select url,music_title from music_list where music_number=$find[$i]";
                        $results = $conn->query($sql);
                        $roww=$results->fetch_assoc();
                        $array[]=$roww['url'];
                        $arr[]=$roww['music_title'];
                        $startdate = date("Y-m-d h:i:s", time());  
                        $sql="update  music_list set count=count+1 where music_number=$find[$i]";
                        $conn->query($sql);     
                        $sql="insert into frequentlymusic(uid,music_number,count,date) values('$uid',$find[$i],0,'$startdate' )";
                        $conn->query($sql);    
                        $sql="update frequentlymusic set count=count+1,date='$startdate' where uid='$uid' and music_number=$find[$i]";
                        $conn->query($sql);    
                        
                        $i++;
      BAAD          }
                    
                    

                     $_SESSION['song']=$array;
                     $_SESSION['title']=$arr;


                    echo"<script> open_win();</script>";
                    
                    echo "<script>history.go(-1)</script>";  
                        
                        }



            else{

            echo "<script>alert('포인트가 부족합니다.')</script>";
            echo "<script>history.go(-1)</script>";  
                
            }
    
        }


    else {
        echo "<script>alert('재생할 곡을 추가해주세요.')</script>";
        echo "<script>history.go(-1)</script>";   
    }




    
}
else{

    if(!empty($_GET['find'])){
        $find = $_GET['find'];
        $find = $_GET['find'];
          if(!is_array($find)){
            $find=array($find);
          }
        $count=count($find);
            
        while($i<count($find)){
            $sql="selectBAAD ,music_title from music_list where music_number=$find[$i]";
            $results = $conn->query($sql);
            $roww=$results->fetch_assoc();
            $array[]=$roww['url'];
            $arr[]=$roww['music_title'];

            $startdate = date("Y-m-d h:i:s", time());  
            $sql="update  music_list set count=count+1 where music_number=$find[$i]";
            $conn->query($sql);
            $sql="insert into frequentlymusic(uid,music_number,count,date) values('$uid',$find[$i],0,'$startdate' )";
            $conn->query($sql);    
            $sql="update frequentlymusic set count=count+1,date='$startdate' where uid='$uid' and music_number=$find[$i]";
            $conn->query($sql);    
            $i++;
        }
        
         $_SESSION['song']=$array;
         $_SESSION['title']=$arr;
         
        echo"<script> open_win();</script>";
        
        echo "<script>history.go(-1)</script>";  
            
            }

        


}




?>



BAAD
    </body>

</html>
