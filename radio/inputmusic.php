<?php session_start();
if(!empty($_SESSION['username'])):?>
<html>
<head>

</head>
<body>
<form action="" method="POST">
<textarea name="tracks" cols="100" rows="50"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
<?php
else:?>
	<p>Please select a username<p>
<?php
endif;
include('connect.php');
if(!empty($_POST['submit'])){
	$tracks = mysqli_real_escape_string($con, $_POST['tracks']);
	$tracks = explode('\r\n', $tracks);
	foreach ($tracks as $i){
		$i = explode('-', $i);
		$artist = $i[0];
		$title = $i[1];
		$album = $i[2];
		if(!empty($artist)&&!empty($title)&&!empty($album)){
			$sql = 'INSERT INTO `tracks` (`artist`, `title`, `album`, `dj`) VALUES ("'.stripslashes($artist).'", "'.stripslashes($title).'", "'.stripslashes($album).'", "'.$_SESSION['username'].'")';
			$result = mysqli_query($con, $sql);
			if(mysqli_affected_rows($con)>0){
			echo stripslashes($artist).'-'.stripslashes($title).'-'.stripslashes($album).' added to your tracklist <br>';
			}
			else{
				echo mysqli_error($con);
			}
		}
	}
}
?>
