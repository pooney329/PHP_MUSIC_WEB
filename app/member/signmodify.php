<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        
        * {box-sizing: border-box}
        body {font-family: "Lato", sans-serif; margin: 0}

        /* Style the tab */
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 20%;
            height: 100vh;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 0px 12px;
            width: 80%;
            border-left: none;
            height: 100vh;
        }
        
        /* Style the form */
        .rsvform {
            width: 600px;
            margin-left: auto;
            margin-right: auto;            
        }
        .divider {
          margin: 0.5em 0 0.5em 0;
          border: 0;
          height: 1px;
          width: 100%;
          display: block;
          background-color: #4f6fad;
          background-image: linear-gradient(to right, #ee9cb4, #4f6fad);
        }        
        .listform {
            width: 800px;
            margin-left: auto;
            margin-right: auto;            
        }
        input[type=text], input[type=datetime-local],  input[type=number], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
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

        /* Style table */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: green;
            color: white;
        }
        * {

box-sizing: border-box;

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

padding: 16px 28px;

border: none;

border-radius: 4px;

cursor: pointer;

float: right;
margin :5px;
text-decoration:none

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
    </style>

</head>
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
    
<body>
    <div class="tab">
      
      <button class="tablinks" onclick="location.href='signmodify.php'">나의정보</button>
      <button class="tablinks" onclick="location.href='datetime.php'">이용권내역</button>
      <button class="tablinks" onclick="location.href='memberdelpage.php'">회원탈퇴</button>
      <button class="tablinks" onclick="location.href='test4.php'">홈으로가기</button>
    </div>

   

    <div id="confirm" class="tabcontent">
    <h2>회원정보수정</h2>

<p>회원정보 수정바랍니다.</p>

<hr>

<?php
include "dbconn.php";
$uid =$_SESSION['uid']; //세션아이디 가져오기
$sql = "select * from member where uid ='$uid'";
$result = $conn->query($sql);

if($result->num_rows>0){
$row = $result->fetch_row();  

//fetch_row는 1차원배열로 가져옴  값만 존재한다(인덱스를 뽑아서사용).  , fetch_assoc는 키와 값가져온다 연관배열
//<input type="text" name="uid" value="<?=$row[0] 는 인데스의 첫번째값가져온다 즉 멤버의 uid를 가져온다     
?>

<div class="container">

  <form action="signmodproc.php" method="post">

    <div class="row">

      <div class="col-25">

        <label for="fname">아이디</label>

      </div>

      <div class="col-75">

        <input type="text" name="uid" readonly value="<?=$row[0]?>">  

      </div>

    </div>

    <div class="row">

      <div class="col-25">

        <label for="lname">이름</label>

      </div>

      <div class="col-75">

        <input type="text" name="uname" value="<?=$row[1]?>">

      </div>

    </div>

    <div class="row">

      <div class="col-25">

        <label for="lname">비밀번호</label>

      </div>

      <div class="col-75">

        <input type="text" name="pwd" value="<?=$row[2]?>">

      </div>

    </div>

    <div class="row">

      <div class="col-25">

        <label for="lname">전화번호</label>

      </div>

      <div class="col-75">

        <input type="text" name="telno" value="<?=$row[3]?>">

      </div>

    </div>

    <div class="row">

      <div class="col-25">

        <label for="lname">주소</label>

      </div>

      <div class="col-75">

        <input type="text" name="addr" value="<?=$row[4]?>">

      </div>

    </div>

    <div class="row">

<div class="col-25">

<label for="lname">포인트</label>

</div>

<div class="col-75">

<input type="text" name="point"  readonly value="<?=$row[5]?>">

</div>

</div>




    <div class="row">

      <input type="submit" value="수정">
      
     
    



    </div>

  </form>

</div>
</div>
<?php }  ?>
    
        
    </div>
    

 

<script>
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 
