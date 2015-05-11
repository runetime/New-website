<?php
if(isset($_COOKIE['embed'])){
    if($_COOKIE['embed']==0){
        header('Location: http://www.streamlicensing.com/stations/runetime/listen.html');
    }
}
else{
    header('Location:getcountry.php');
}
?>
<html>
<head>
<title>Radio</title>
<link href='../Style/style.css' rel='stylesheet' type='text/css'>
<script>
function timetable(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=492,width=1000,left=10,top=10,resizable=yes,scrollbars=no,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
</head>
<body>
<?php include '../includes/navigation.php';?>
<div class='main_page'>
    <div class='main_radio_middle'>
    <div id='main_title'>
    <img src="../images/radiologo.png">
			</div>
    <script type='text/javascript' src='http://www.primcast.com/jwplayer6/jwplayer.js'></script>
    <div id='player_preview'>
<a href='http://runetime.primcast.com:6582/;stream.mp3' id='android_firefox' style='display:none;'> Watch this stream over RTSP for Android Mozilla</a>
</div>
<script type='text/javascript'>
  if (navigator.userAgent.match(/Android/i) && navigator.userAgent.match(/Firefox/i) )
   { document.getElementById('android_firefox').style.display = '';
     document.getElementById('video_tag').style.display = 'none';
   }
  jwplayer('player_preview').setup({
    playlist: [{
      sources: [
       {file:'http://runetime.primcast.com:6582/;stream.mp3',},
       {file:'http://runetime.primcast.com:6582/;stream.mp3/playlist.m3u8'}
      ]
     }],
     height: 25,
     width: 560,
     fallback: false,
     repeat: true,
     autostart: false
  });
</script>
<div id="buttons">
<a href=""><div class='button'>DJ Playlist/Requests</div></a>
<a href=""><div class='button'>Request Shoutout</div></a>
<a href=""><div class='button'>Song History</div></a>
<a href="JavaScript:timetable('http://mazzor.com/Test/Radio/timetable.php');"><div class='button'>DJ Timetable</div></a>
</div>

		</div>
	</div>
</body>
</html>
