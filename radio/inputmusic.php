<html>
<head>

</head>
<body>
<form action="" method="POST">
<textarea name="tracks"></textarea>
<input type="submit" name="submit" value="Submit">
</form>
<?php
include('connect.php');
if(!empty($_POST['submit'])){
    $tracks = mysqli_real_escape_string($con, $_POST['tracks']);
    print_r($tracks);
    $tracks = explode(PHP_EOL, $tracks);
    print_r($tracks);
    foreach ($tracks as $i){
    $i = explode('-', $i);
    $artist = $i[0];
    $title = $i[1];
    $album = $i[2];
    $sql = 'INSERT INTO `tracks` (`artist`, `title`, `album`) VALUES ("'.$artist.'", "'.$title.'", "'.$album.'")';
    echo $artist.'-'.$title.'-'.$album.'<br>';
    }
}
?>
</body>
</html>