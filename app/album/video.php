<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <title>Contact Us</title>
        <meta charset="utf-8">
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
            * {
                box-sizing: border-box;
            }
            body {
                text-align: center;
            }
            #pizza {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #pizza td, #pizza th {
                border: 1px solid #ddd;
                padding: 8px;
            }

           

            #pizza tr:nth-child(even){background-color: #202932;;}

            #pizza tr:hover {background-color: #f2f2f2;;}

            #pizza th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
               


                background-color: #202932;
                color: #fff;
                border: 1px solid #f2f2f2;
            }    
            
            .paging_area { 
                width: 100%;
                height: 50px;
                padding-top: 7px;
                margin-left: auto;
            }
            .paging_area a, .paging_area span {
                color: black;
                display: inline-block;
                padding: 8px 16px;
                text-decoration: none;
                transition: background-color .3s;
               
            }

            .paging_area a.active {
                background-color: dodgerblue;
                color: white;
            }

            .paging_area a:hover:not(.active) {background-color: #fefefe;}

            
            .topnav .search-container {
              float: right;
            }

            .topnav input[type=text] {
              padding: 6px;
              margin-top: 8px;
              font-size: 17px;
              border: 3px solid #ddd;
                margin-right: 6px; 
                margin-bottom: 10px;
            }

            .topnav .search-container button {
              float: right;
              padding: 6px 10px;
              margin-top: 8px;
              margin-right: 16px;
              background: #ddd;
              font-size: 17px;
              border: none;
              cursor: pointer;
            }

            .topnav .search-container button:hover {
              background: #ccc;
            }
            .topnavs {
                background-color: #333;
                overflow: hidden;
                margin-top:0px;
            }
            /* Style the links inside the navigation bar */
            .topnavs a {
              float: left;
              color: #f2f2f2;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
              font-size: 17px;
            }
            /* Change the color of links on hover */
            .topnavs a:hover {
              background-color: #ddd;
              color: black;
            }
            /* Add a color to the active/current link */
            .topnavs a.active {
              background-color: #4CAF50;
              color: white;
            }
            /* Right-aligned section inside the top navigation */
            .topnavs-right {
              float: right;
            }  
            html { 
  background: url(./image/bbackground.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
        </style>
        <script>
            function mysub(index){
                if(index==1){
                    document.myForm.action='play2.php';
                }
                document.myForm.submit();
            }
        </script>
    </head>
    <body>
    <div class="topnavs">
          <a class="active" href="index.php">메인으로</a>
          <a href="#news">News</a>
          <a href="#contact">Contact</a>
          <div class="topnavs-right">
              <?php 
                include "dbconn.php";

                if(isset($_SESSION['uname'])){
                        $uid=$_SESSION['uid'];
                    $sql = "select point from member where uid= '$uid'";

                    $result=$conn->query($sql);
                    $row = $result->fetch_assoc();

                    
                ?>    
                
                <a href ="signmodify.php"><?=$_SESSION['uname']?></a>
                <a href="logout.php">SignOUT</a>
                <a href="mypage.php">나의 정보</a>
                <a href="point.php"><?=$row['point']?></a>
                <a href="tiket.php">이용권 구매</a>
                <?php } else{ ?>
            
            <a href="signin.html">Signin</a>
            <a href="signup.html">Signup</a>
            <?php }  ?>
            <a href="#about">About</a>
          </div>
          </div>


            


        <h1>음악 차트</h1>
        
        <?php
        include_once "dbconn.php";
        if(!empty($_GET['video'])){
        $video=$_GET['video'];
        ?>
        <iframe width="854" height="480" src="<?=$video?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <?php
        }
        else {
            echo"뮤비가 존재하지 않습니다..";
        }
                    
        
        $conn->close();
        ?>
    </body>
</html>








