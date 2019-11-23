<?php session_start() ?>
<!doctype html>
<html>
    <head>
        <title>이용권 구매</title>
        <meta charset="utf-8">
        <style>

body, html {

    height: 100%;

    font-family: Arial, Helvetica, sans-serif;

}



* {

    box-sizing: border-box;

}



.bg-img {

    /* The image used */

    background-image: url("pizza.jpg");



    min-height: 380px;



    /* Center and scale the image nicely */

    background-position: center;

    background-repeat: no-repeat;

    background-size: cover;

}



/* Add styles to the form container */

.container {

    position: absolute;

    

    margin-top: 100px;
    margin-right: 300px;
    margin-left:600px;

    max-width: 400px;

    padding: 16px;

    background-color: white;

}



/* Full-width input fields */

input[type=text], input[type=number] {

    width: 100%;

    padding: 15px;

    margin: 5px 0 22px 0;

    border: none;

    background: #f1f1f1;

}



input[type=text]:focus, input[type=number]:focus {

    background-color: #ddd;

    outline: none;

}



input[type=radio] {

    margin: 5px 0;

}

/* Set a style for the submit button */

.btn {

    background-color: #4CAF50;

    color: white;

    padding: 16px 20px;

    border: none;

    cursor: pointer;

    width: 100%;

    opacity: 0.9;

}



.btn:hover {

    opacity: 1;

}



.title {

    position: absolute;

    top: 10px;

    left: 40px;

    color: black;

}
.img{
    width: 100%;
}
</style>    </head>
    <body>
    <?php
    // 로그인했는지 체크
    if(!isset($_SESSION['uid'])) {
        echo "<script>alert('로그인을 하지 않았습니다.');</script>";
        header("location: index.php");
    }
    
    
    ?>
    <h1 class="title">음악재생 30일 이용권 </h1>
    <div class="bg-img">
        <form action="tiket_buy.php" method="get">
            <div class="container">
                
                <img src="./image/smartmusic.jpg" class="img"></a>
                <label for="qty"><b>가격</b></label>
                <input type="text" name="price" value="20000" readonly >
                
                <button type="submit" class="btn">구매하기</button>
            </div>
        </form>
    </body>
</html>
