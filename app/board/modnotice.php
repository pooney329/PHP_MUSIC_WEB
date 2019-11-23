<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
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
    .divider {
      margin: 0.5em 0 0.5em 0;
      border: 0;
      height: 1px;
      width: 100%;
      display: block;
      background-color: #4f6fad;
      background-image: linear-gradient(to right, #ee9cb4, #4f6fad);
    }        
    input[type=text], input[type=email], select, textarea {
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

    input[type=submit],button {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin: 0 10px;
    }

    input[type=submit]:hover ,button:hover{
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
    <body>
        <h2>공지사항변경</h2>
        <p>공지사항을 변경합니다.</p>
        <?php
        include_once "dbconn.php";

        $no = $_GET['no'];
        
        $sql = "select * from notice where no = $no";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_row();
            
            

          
        }
        else echo $conn->error . ":" . $sql;
        ?>
        <div class="divider"></div>
        <div class="container">
          <form action="modnotice_proc.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="title">분류</label>
              </div>
              <div class="col-75">
                <input type="text" name="classification" value="<?=$row[1]?>">
                <input type="number" name="no" value="<?=$row[0]?>" hidden>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="name">제목</label>
              </div>
              <div class="col-75">
                <input type="text" name="title" value="<?=$row[2]?>">
              </div>
            </div>
            
            <div class="row">
              <div class="col-25">
                <label for="msg">내용</label>
              </div>
              <textarea name="content" cols="80" rows="10"><?=$row[3]?></textarea>
            <div class="row">
            <button type="button" 
                    onclick="location.href='delnotice.php?no=<?=$row[0]?>'">삭제하기</button>
                    <!-- 자바스크립트 버튼구현시 안날라가니깐 get으로 넘겨줘야된다 -->

              <input type="submit" value="수정하기">
              
            </div>
            
          </form>
        </div>
    </body>
</html>
