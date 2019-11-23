<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <title>앨범 정보</title>
        <meta charset="utf-8">
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/styles2.css">
        <style>
           
            
        #left{
            width:30%; height:300px; background-color:white; border:groove 1px silver;
            
            float:left;}
        
        #content{
            
            width:70%; 
            height:300px; 
            background-color:#333; border:groove 1px silver;
            float:left;}

        .list{
            color:white;
            text-align:left;
            margin-top:25px;
            margin-left:400px;
        }
        #px{font-size: 20px;}
        </style>
        <script src="//code.jquery.com/jquery-1.11.0.js"></script>
        <script>
            function mysub(index){
                if(index==1){
                    document.myForm.action='play2.php';
                }
                document.myForm.submit();
            }ㄴ
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
            <a href="#about">About</a>
          </div>
          </div>


            


        <h1>앨범 정보</h1>
        
        <?php
 
        include_once "dbconn.php";
        $album_title = $_GET['album_title'];
        $result = $conn->query("select * from music_list ,album where album.album_title='$album_title' and music_list.album_title=album.album_title ");
        $row = $result->fetch_assoc()
        ?>
            <div style="width:100%;">
            <div id="left"><img src='./image/<?=$row['photo']?>' width='100%' height="100%"></div>
            <div id="content"> 
                    <div class='list'><span id="px" ><?=$row['album_title']?></span></div>
                    <div class='list'><?=$row['music_singer']?></div>
                    <div class='list'>발매일 &nbsp; <?=$row['release_date']?></div>
                    <div class='list'>장르 &nbsp;&nbsp;&nbsp; &nbsp;<?=$row['genre']?></div>
                    <div class='list'>발매사 &nbsp; <?=$row['agency']?></div>
                    <div class='list'>기획사 &nbsp; <?=$row['company']?></div>

            </div>
        
        
        <?php
        if(isset($_GET['search']) && strpos($_GET['search'], "%") === false)
            $search = "%" . $_GET['search'] . "%";
        else if(!isset($_GET['search'])) 
                $search = "%";
        else $search = $_GET['search']; 

        $listsize = 10; 
        $pages = 3; 
        
        $page = $_GET['page'] ? intval($_GET['page']) : 1;
        $result = $conn->query("select count(*) from music_list  where album_title='$album_title'");
        $row = $result->fetch_row();
        $rowcount = $row[0];  
        $pagecount = (int)($rowcount / $listsize);
        if($rowcount % $listsize > 0) $pagecount++; 

        
        $startpage = max($page - $pages, 1);
        $endpage = min($page + $pages, $pagecount);
        
        $offset = ($page - 1) * $listsize; 
        $sql = "select * from music_list where  album_title='$album_title' order by music_number  limit $offset, $listsize";
        
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $i=1;
        ?>

          
          
        
        </div>


        <form action=myplayadd.php  method="get" name='myForm'>
        <table id="pizza">
            <tr>
            <th style="width:2%"><input type="checkbox" name="all" class="check-all"></th>
                <th style="width:2%">번호</th>
                
                
                <th style="width:10%">제목</th>
                <th style="width:15%">가수</th>
                <th style="width:15%">앨범</th>
                <th style="width:15%">듣기</th>
                
                
            </tr>
        <?php
            while($row = $result->fetch_assoc()) {
                
        ?>
            <tr>
                <td class="coll" ><input type="checkbox" name="find[]" class='ab' value="<?=$row['music_number']?>"></td> 
                <td class="coll"><?=$i?></td>
                
                
                <td class="coll" ><?=$row['music_title']?></td>
                <td class="coll"><a href="singer.php?page=1&singer=<?=$row['music_singer']?>"><?=$row['music_singer']?></a></td>
                <td class="coll"><a href="album.php?page=1&album_title=<?=$row['album_title']?>"><?=$row['album_title']?></a></td>
                <td><a class="btn blue" href="play2.php?find=<?=$row['music_number']?>"><img src='./image/playbutton.png' width='20%'height='10%' ></a> <a class="btn blue" href="video.php?video=<?=$row['video']?>"><img src='./image/youtube.jpg' width='20%'height='10%' ></a>
                <a class="btn blue" href="javascript:popupOpen(<?=$row['music_number']?>);"><img src='./image/list.jpg' width='20%'height='6.5%' > </a></td></td>


                
                
            </tr>
        <?php   $i++; } ?>
        </table>
        
        <div class="paging_area">
            <?php
        
            if($page > 1) {
                $prev = $page - 1;
                echo "<a href='myplaylist.php?page=$prev&search=$search'>PREV</a>";
            }
            else
                echo "<span>PREV</span>";    
        
            for($p=$startpage; $p<=$endpage; $p++) {
                if($page == $p)
                    echo "<a class='active' href='#'>$p</a>";
                else
                    echo "<a href='myplaylist.php?page=$p&search=$search'>$p</a>";
            }


            
        
            if($page < $endpage) {
                $prev = $page + 1;
                echo "<a href='myplaylist.php?page=$prev&search=$search'>NEXT</a>";
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








