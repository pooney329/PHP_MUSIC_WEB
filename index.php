<?php session_start() ?> 
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <head>
     <title>음악 사이트</title>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
       

    
    <script>
        function go_cart(cart) {
            var go = confirm('로그인을 하시겠습니까?');
            if(go)
                location.href=cart;
            else {
                location.href="test4.php";
            }
        }
    </script>
    
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
        body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
    </style>
    
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">
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
            
            <a href="signin.html">로그인 </a>
            <a href="signup.html">회원가입 </a>
            <?php }  ?>
            <a href="listcontact.php?page=1">자유게시판</a>
          </div>
          </div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="image/ba.jpg" style="width:75%;" class="w3-round"><br><br>
    <h4><b>방탄소년단</b></h4>
  </div>
  <div class="w3-bar-block">
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>인기가수</a> 
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>앨범</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>추천음악</a>
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
    
    <div>
        <a href="pointmodifyt.php?po=50" onclick="popupOpen()" ><img src="https://ssl.pstatic.net/tveta/libs/1240/1240687/733dba95f78b12c5f4ce_20190530185153629.jpg"></a>
    </div>
    
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>형님 둘 아우 하나 </b></h1>
    <div class="w3-section w3-bottombar w3-padding-16"> 
      <button class="w3-button w3-black" onclick="location.href='music_chart.php?page=1'">음악차트</button>
      <button class="w3-button w3-white" onclick="location.href='myplaylist.php?page=1'">재생목록</button>
      <button class="w3-button w3-white w3-hide-small" onclick="location.href='music_genre.php?page=1&genre=Ballad'">음악장르</button>
      <button class="w3-button w3-white w3-hide-small" onclick="location.href='recentlymusic.php?page=1'">최신곡</button>
        <button class="w3-button w3-white w3-hide-small" onclick="location.href='recentlyalbum.php?page=1'">최신앨범</button>
        <button class="w3-button w3-white w3-hide-small" onclick="location.href='notice.php?page=1'">공지사항</button>
        
    </div>
    </div>
  </header>
  
  <!-- First Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="image/1.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>보좌관-세상을 움직이는 사람들 OST Part 1</b></p>
        <p>JTBC 금토 드라마 보좌관 – 세상을 움직이는 사람들OST Part.1 
            EXO 첸(CHEN) - Rainfall</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="image/2.jpg" alt="Norway" style="width:100%; " class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>너에게 못했던 내 마지막 말은</b></p>
        <p>너에게 못했던 내 마지막 말은..
            언제든 돌아와 난 여기 있을거야 아무 일 없던 것처럼</p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="image/3.jpg" alt="Norway" style="width:100%; height:330px;" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>FANCY YOU</b></p>
        <p>트와이스, 일곱 번째 미니앨범 ‘FANCY YOU' - 타이틀곡 ‘FANCY' 발표! “새로워진 트와이스에 반하다!”
           타이틀곡 ‘FANCY', 매혹적인 멜로우 무드 팝 댄스 곡 “I FANCY YOU!” '새로워진 트와이스'를 제시 !</p>
      </div>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="image/4.jpg" alt="Norway" style="width:100%; height:330px;" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>전설</b></p>
        <p>잔나비 정규 2집
            3년 만에 돌아온 잔나비의 2집이네요. 머나먼 시간이었죠.
            그 사이 많은 것들이 변했어요. 세상은 더 이상 갈망하지 않고, 치열하게 부딪히며 사랑하던 모든 관계 역시 시대답게 편리해진 듯해요</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="image/5.jpg" alt="Norway" style="width:100%; height:330px;" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>누구없소</b></p>
        <p>매 앨범마다 다양한 연령대의 리스너들로부터 사랑받아온 이하이가 더욱 다채롭고 풍부한 색을 품고 [24℃] 앨범으로 돌아왔다. </p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="image/6.jpg" alt="Norway" style="width:100% ;height:330px;" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>사계</b></p>
        <p>‘믿고 듣는 보컬퀸' 태연, 새 싱글 ‘사계' 공개!
            ‘감성 장인' 태연이 선사하는 깊은 울림! 사계절 내내 듣고 싶은 노래!</p>
      </div>
    </div>
  </div>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>
   
  <!-- Images of Me -->
  

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}




function popupOpen(){

	var popUrl = "https://www.chevrolet.co.kr/campaign/2019-the-new-spark/index.gm?cmp=OLA_DISPLAY_22594605_247958729_442200987_0_CV1_CV2";	//팝업창에 출력될 페이지 URL

	var popOption = "width=1000, height=800, resizable=no, scrollbars=no, status=no;";    //팝업창 옵션(optoin)

		window.open(popUrl,"",popOption);

	}







    
</script>

</body>
</html>
