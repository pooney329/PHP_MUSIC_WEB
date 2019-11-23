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

           

            #pizza tr:nth-child(n){background-color: #202932;;}

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
                
                overflow: hidden;
                margin-top:0px;
            }
            .topnavss {
                /* background-color: #333; */
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
            .topnavss a {
              float: center;
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
    .topnavs-center{
        float: center;
        background-color: pink;
        margin-top: 100px;
        padding :20px;
        
    }

    .topnavs-center a {
        color: black;
        font-size: 20px;
        padding-left:100px;
        padding-right:100px;
    }
    .topnavs-center a:hover {
              background-color: #ddd;
              color: black;
    }
    .bo {
            margin : auto;
            height: 500px;

            width: 1500px;

            background-color: white;
        }
    .boo {
            margin : auto;
            height: 50px;

            width: 1500px;

            background-color: yellow;
        }

        .cc{
            padding-left:50px;
            padding-top:10px;
            float: left;

        }
        .ccc{
            padding-right:50px;
            padding-top:10px;
            float: right;

        }
        p{margin-top:100px}
        </style>
        <script src="//code.jquery.com/jquery-1.11.0.js"></script>
        <script>
            function mysub(index){
                if(index==1){
                    document.myForm.action='playlistdel.php';
                }
                document.myForm.submit();
            }
            function popupOpen(inde){

                    var popUrl = "lyrics.php?number="+inde;	

                    var popOption = "width=370, height=360, resizable=no, scrollbars=no, status=no;";    
                        window.open(popUrl,"",popOption);

            }
            
         $( document ).ready( function() {
        $( '.check-all' ).click( function() {
          $( '.ab' ).prop( 'checked', this.checked );
        } );
      } );

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
            <a href="listcontact.php?page=1">자유게시판</a>
          </div>
          </div>

            
        <?php
        
        $no = $_GET['no'];
        $sql = "update notice set count=count+1   where no = $no";
        $result = $conn->query($sql);

        $sql = "select * from notice where no = $no";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_row();
            
            

          
        }
        else echo $conn->error . ":" . $sql;
        
        ?>
                    

            <hr>
            <h1> 공지사항</h1>
            <div class ="bo"> 
                <div class="boo" > 
                    <div class="cc"> <?=$row[0]?> </div>    
                    <div  class="cc"> <?=$row[1]?> </div>  
                    
                    <div  class="cc"> <?=$row[2]?> </div>  
                    <div  class="ccc"> <?=$row[5]?>  </div>  
                    <div  class="ccc">BAAD$row[4]?>  </div>  
                    
                </div>
                <p align="left">
                <?=$row[3]?>  
                </p>

            </div>
                

      
        <?php


   




        ?>
    </body>
</html>













