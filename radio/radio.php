<?php ob_start()?>
<html>
<head>
<title>Radio</title>
</head>
<body>
<?php
if(isset($_COOKIE['embed'])){
    if($_COOKIE['embed']==0):?>
       code for not embedded 
 
    <?php else:?>
<script type='text/javascript' src='http://www.primcast.com/jwplayer6/jwplayer.js'></script>
<div id='player_preview' style='float:left;'>
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
    <?php endif;
}
else{
    ob_end_clean();
    header('Location:getcountry.php');
}
?>
</body>
</html>