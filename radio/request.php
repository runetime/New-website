<?php
session_start();
include('connect.php');
$id = mysqli_real_escape_string($con, $_GET['id']);
$username = $_SESSION['username'];
if(mysqli_num_rows($result)>0){
   while($row = mysqli_fetch_array($result)){
$dj = $row['dj'];
    }
}
else{
    echo mysqli_error($con);
}
if(!empty($dj)){
    $sql = 'SELECT * FROM `tracks` WHERE `dj`="'.$dj.'" AND `id`="'.$id.'"';
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
        $sql = 'INSERT INTO `requests` (`requested_by`, `artist, `title`) VALUES ("'.$username.'", "'.$row['artist'].'", "'.$row['title'].'") '
    }
    else{
        echo mysqli_error($con);
    }
}
?>