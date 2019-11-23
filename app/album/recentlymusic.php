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
           * {    margin: 0;
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
            a{
                text-decoration: none;
            }
           

            #pizza tr:nth-child(n){background-color: aliceblue;;}

            #pizza tr:hover {background-color: #f2f2f2;;}

            #pizza th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
               


                background-color: cadetblue;
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
              color: black;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
              font-size: 17px;
            }
            .topnavss a {
              float: center;
              color: black;
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
              background-color:darkturquoise;
              color: black;
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
        background-color: gainsboro;
        margin-top: 100px;
        padding :20px;
        border: 1px solid white;
        
    }

    .topnavs-center a {
        color: black;
        font-size: 20px;
        padding-left:100px;
        padding-right:100px;
    }
    .topnavs-center a:hover {
              background-color: lavenderblush;
              color: black;
            }
            body{
                background-color:white;
            }
        </style>
         <script src="//code.jquery.com/jquery-1.11.0.js"></script>
        <script>
            function mysub(index){
                if(index==1){
                    document.myForm.action='play2.php';
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
        <a class="active" href="test4.php">메인으로</a>
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
                <a href="logout.php">로그아웃 </a>
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


            


        <h1>최신 음악</h1>
        <div class="topnav">
            <div class="search-container">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">  
                
                    <input type="text" name="page" value="1" hidden>
                    <input type="text" name="search" placeholder="제목을 입력하세요..">
                    
                    <button type="submit">
                        <i class="fa fa-search"> </i>
                    </button>
                </form>
            </div>
        </div>
        <?php
        include_once "dbconn.php";
        if(isset($_GET['search']) && strpos($_GET['search'], "%") === false)
            $search = "%" . $_GET['search'] . "%";
        else if(!isset($_GET['search'])) 
                $search = "%";
        else $search = $_GET['search']; 

        $listsize = 6; 
        $pages = 3; 
        
        $page = $_GET['page'] ? intval($_GET['page']) : 1;
        $result = $conn->query("select count(*) from music_list,album where album.album_title=music_list.album_title and music_title like '$search'");
        $row = $result->fetch_row();
        $rowcount = $row[0];  
        $pagecount = (int)($rowcount / $listsize);
        if($rowcount % $listsize > 0) $pagecount++; 

        
        $startpage = max($page - $pages, 1);
        $endpage = min($page + $pages, $pagecount);
        
        $offset = ($page - 1) * $listsize; 
        $sql = "select * from music_list,album where album.album_title=music_list.album_title and music_list.music_title  like '$search' order by  album.release_date DESC limit $offset, $listsize";
        
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $i=1;
        ?>
        <form action=myplayadd.php method="get" name='myForm'>
        <table id="pizza">
            <tr>
            
                <th style="width:2%"><input type="checkbox" name="all" class="check-all"></th>
                <th style="width:2%">번호</th>
                <th style="width:3%"></th>
                
                <th style="width:10%">제목</th>
                <th style="width:15%">가수</th>
                <th style="width:15%">앨범</th>
                <th style="width:15%">듣기</th>
                
                
            </tr>
        <?php
            while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td class="coll" ><input type="checkbox" name="find[]"  class="ab" value="<?=$row['music_number']?>"></td> 
                <td class="coll"><?=$i?></td>
                <td class="coll" ><a href="album.php?page=1&album_title=<?=$row['album_title']?>"><img src='./image/<?=$row['photo']?>' width="180" height="120"></a></td>
                
                <td class="coll" ><?=$row['music_title']?></td>
                <td class="coll"><a href="singer.php?page=1&singer=<?=$row['music_singer']?>"><?=$row['music_singer']?></a></td>
                <td class="coll"><a href="album.php?page=1&album_title=<?=$row['album_title']?>"><?=$row['album_title']?></a></td>
                
                <td><a class="btn blue" href="play2.php?find=<?=$row['music_number']?>"><img src='./image/playbutton.png' width='20%'height='10%' ></a> <a class="btn blue" href="video.php?video=<?=$row['video']?>"><img src='./image/youtube.jpg' width='20%'height='10%' ></a>
                <a class="btn blue" href="javascript:popupOpen(<?=$row['music_number']?>);"><img src='./image/list.jpg' width='20%'height='6.5%' > </a></td>
            
            


                
                
            </tr>
        <?php $i++; } ?>
        </table>
        
        <div class="paging_area">
            <?php
        
            if($page > 1) {
                $prev = $page - 1;
                echo "<a href='recentlymusic.php?page=$prev&search=$search'>PREV</a>";
            }
            else
                echo "<span>PREV</span>";    
        
            for($p=$startpage; $p<=$endpage; $p++) {
                if($page == $p)
                    echo "<a class='active' href='#'>$p</a>";
                else
                    echo "<a href='recentlymusic.php?page=$p&search=$search'>$p</a>";
            }
        
           


            if($page < $endpage) {
                $prev = $page + 1;
                echo "<a href='recentlymusic.php?page=$prev&search=$search'>NEXT</a>";
            }
            else
                echo "<span>NEXT</span>";    
            ?>
            <input type="submit" value="담기">
            <input type="button" onClick ='mysub(1)' value='재생'> 
    </form>
        </div>
        <?php } else {
            echo "검색된 레코드가 없습니다.<br>";
            echo $conn->error . ":" . $sql;
        }
        $conn->close();
        ?>
    </body>
</html>








