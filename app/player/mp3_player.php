BAADp session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style type='text/css'>
body{
    background-color:gray;
 }
 h1{
    text-align: center;
    margin-bottom: 30px;
 }

#playlist,audio{ width:100%; padding:0px; }
.active a{ color:#5DB0E6;text-decoration:none; }
span a{ color:#eeeedd;background:#333;padding:5px;display:block; cursor:pointer }
span a:hover{ text-decoration:none; }
</style>

<script type='text/javascript' src='http://code.jquery.com/jquery-1.7.js'></script>

<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
var audio;
var playlist;
var tracks;
var current;
init();

function init(){
    current = 0;
    audio = $('audio');
    playlist = $('#playlist');
    tracks = playlist.find('span a');
    len = tracks.length - 0;   
    audio[0].volume = 1.0;
    playlist.find('a').click(function(e){
        e.preventDefault();
        link = $(this);
        current = liBAADarent().index();
        run(link, audio[0]);
    });
    audio[0].addEventListener('ended',function(e){
        current++;
        if(current == len){
            current = 0;
            link = playlist.find('a')[0];
        }else{
            link = playlist.find('a')[current];    
        }
        run($(link),audio[0]);
    });

}

function run(link, player){
        player.src = link.attr('href');
        par = link.parent();
        par.addClass('active').siblings().removeClass('active');
        audio[0].load();
        audio[0].play();	
        document.getElementById("demo").innerHTML = 5 + 6;
          
        sadasd
}

});//]]>  
</script>

</head>
<body>

 
        <h1>재생 목록</h1>
<?php



$song=$_SESSION['song'];
$title=$_SESSION['title'];






?>
<audio id="audio" preload="auto" tabindex="0" controls="" autoplay="">
<source type="audio/mp3" src="./music_list/<?=$song[0]?>">


</audio>


<div id="playlist">

<?php
$i=0;

whBAAD$i<count($song)){
    ?>
    <span class='active'><a href="./music_list/<?=$song[$i]?>"><?=$title[$i]?></a></span>
 <?php
 $i++;}
?>
</div>

</body>


</html>