<!doctype html>
<html>
    <head>
        <title>Contact Us</title>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
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
                margin: 0;
            }
        </style>
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
            
            <a href="signin.html">로그인</a>
            <a href="signup.html">회원가입</a>
            <?php }  ?>
            <a href="listcontact.php?page=1">자유게시판</a>
          </div>
          </div>
        <h1>자유게시판</h1>
        
        <div class="topnav">
            <div class="search-container">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
                    <input type="text" name="page" value="1" hidden>
                    <input type="text" name="search" placeholder="Search..">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <?php
        include_once "dbconn.php";

        // 주소줄에 search가 있고 그 안에 %가 없을 때는 %를 앞뒤에 붙이기
        if(isset($_GET['search']) && strpos($_GET['search'], "%") === false)
            $search = "%" . $_GET['search'] . "%";
        else if(!isset($_GET['search'])) // 주소줄에 search가 없을 때
                $search = "%";
        else $search = $_GET['search']; // search가 있고 그 안에 %가 있을 떄

        $listsize = 6; // 한 페이지에 보일 레코드 수
        $pages = 3; // 좌우에 몇개의 추가 페이지를 보일 것인가?
        // 현재 페이지 가져오기
        $page = $_GET['page'] ? intval($_GET['page']) : 1;
        $result = $conn->query("select count(*) from contact where title like '$search'");
        $row = $result->fetch_row();
        $rowcount = $row[0];  // 전체 레코드 개수
        $pagecount = (int)($rowcount / $listsize);
        if($rowcount % $listsize > 0) $pagecount++; // 페이지 개수

        // 현재 페이지 기준으로 왼쪽에 나올 시작 페이지
        // 현재 페이지 기준으로 오른쪽에 나올 끝 페이지
        $startpage = max($page - $pages, 1);
        $endpage = min($page + $pages, $pagecount);
        // 시작부터 건너갈 레코드 개수
        $offset = ($page - 1) * $listsize; 
        $sql = "select * from contact where title like '$search' order by no desc limit $offset, $listsize";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
        ?>
        <table id="pizza">
            <tr>
                <th style="width:7%">번호</th>
                <th>제목</th>
                <th style="width:10%">작성자</th>
                <th style="width:15%">이메일</th>
                <th style="width:15%">작성일</th>
            </tr>
        <?php
            while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?=$row['no']?></td>
                <td><a href="modcontact_check.php?no=<?=$row['no']?>"><?=$row['title']?></a></td>
                <td><?=$row['name']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['wdate']?></td>
            </tr>
        <?php } ?>
        </table>
        <!-- Paging -->
        <div class="paging_area">
            <?php
            // 이전 버턴
            if($page > 1) {
                $prev = $page - 1;
                echo "<a href='listcontact.php?page=$prev&search=$search'>PREV</a>";
            }
            else
                echo "<span>PREV</span>";    
            // 페이지 번호 출력
            for($p=$startpage; $p<=$endpage; $p++) {
                if($page == $p)
                    echo "<a class='active' href='#'>$p</a>";
                else
                    echo "<a href='listcontact.php?page=$p&search=$search'>$p</a>";
            }
            // 다음 버턴
            if($page < $endpage) {
                $prev = $page + 1;
                echo "<a href='listcontact.php?page=$prev&search=$search'>NEXT</a>";
            }
            else
                echo "<span>NEXT</span>";    
            ?>
            
        </div>
        
        <button type="button" 
                    onclick="location.href='newcontact.html'">글쓰기</button>

        <?php } else {
            echo "검색된 레코드가 없습니다.<br>";
            echo $conn->error . ":" . $sql;
        }
        $conn->close();
        ?>
    </body>
</html>








