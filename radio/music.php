<?php
session_start();
include('connect.php');
ob_start();
?>
<html>
<head>
</head>
<body>
<table>
<tr>
<td>Artist</td>
<td>Title</td>
<td>Album</td>
<td></td>
</tr>
<?php
$dj = '' ; //find someway to get the dj that is on air
if(!empty($dj)){
    $sql = 'SELECT * FROM `tracks` WHERE `dj`="'.$dj.'" ORDER BY `artist`';
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            echo '<tr>';
            echo '<td>'.$row['artist'].'</td>';
            echo '<td>'.$row['title'].'</td>';
            echo '<td>'.$row['album'].'</td>';
            echo '<td><a href="request.php?id='.$row['id'].'">Request song</a></td>';
            echo '</tr>';
        }
    }
    else{
        echo mysqli_error($con);
    }
}
else{
    ob_end_clean();
    echo 'There\'s no dj online at this time';
}
?>
</table>
</body>
</html>