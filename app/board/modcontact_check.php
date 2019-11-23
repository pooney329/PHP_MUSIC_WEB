BAADCTYPE html>
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
    input[type=text], input[type=email], select, textarea,input[type=password] {
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
        border: nonBAAD        border-radius: 4px;
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
    </style>
    </head>
    <body>

    <?php
        $no =$_GET['no'];

    ?>
        <h2>비밀번호</h2>
        <p>선택한 글의 비밀번호를 입력하세요</p>
        <div class="divider"></div>
        <div class="container">
          <form action="modcontact.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="title">비�BAAD호</label>
              </div>
              <div class="col-75">
                  <input type="number" name="no" value="<?=$no?>" hidden>
                <input type="password" name="pwd" placeholder="password..">
              </div>
            </div>

            
            <div class="row">
              <input type="submit" value="확인하기">
            </div>
          </form>
        </div>
    </body>
</html>
 