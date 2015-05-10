<?php session_start();
include('connect.php');
$format = 'd/m/Y';

for($number=1; $number<=7; $number++) {
    $difference = strtotime('+' . $number . ' days');
    $day = strtolower(date('l', $difference));
    $$day = date($format, $difference);
}

$todayName = strtolower(date('l'));
$$todayName = date($format);

?>
<html>
<head>
<title>Timetable</title>
<link href='timetable.css' rel='stylesheet' type='text/css'>
<meta http-equiv="refresh" content="1800">
</head>
<body>
<table style="width:100%" border="2">
<tr>
<td class="timezone"><a href="http://time.is/GMT">GMT</a></td>
<td>Monday (<?php echo $monday;?>)</td>
<td>Tuesday (<?php echo $tuesday;?>)</td>
<td>Wednesday (<?php echo $wednesday;?>)</td>
<td>Thursday (<?php echo $thursday;?>)</td>
<td>Friday (<?php echo $friday;?>)</td>
<td>Saturday (<?php echo $saturday;?>)</td>
<td>Sunday (<?php echo $sunday;?>)</td>
</tr>
<?php
$today = date('N');
$hour = date('G');
for($i = 0; $i <= 23; $i++){
        echo '<tr>';
        echo '<td>';
    if($i<10){
        $i = '0'.$i;
    }
    echo $i.':00';   

    echo '</td>';
    for($z = 1; $z <= 7; $z++){
        $id = $z.'-'.$i;
        $sql = "SELECT * FROM `timetable` WHERE `day` = '".$z."' AND `time` = '".$i."'";
        $result = mysqli_query($con, $sql);        
        if($z == $today && $i == $hour){
            echo '<td class="now">';
        }
        else{ 
            echo '<td>';
        }
        if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            if($_SESSION['logged_in']==1&&empty($row['dj'])){ 
                echo '<a href="book.php?time='.$id.'&dj='.$_SESSION['username'].'">-</a>';
            }
            elseif($_SESSION['logged_in']==1&&$row['dj']==$_SESSION['username']){
                 echo '<a href="book.php?time='.$id.'&dj='.$_SESSION['username'].'">DJ '.$row['dj'].'</a>';
            }
            else{
                if(empty($row['dj'])){
                    echo '-';
                }
                else{
                    echo 'DJ '.$row['dj'];
                }
            }
        }
        }
        echo '</td>';
        
    }
    echo '</tr>';
}
?>
</table>
</body>
</html>