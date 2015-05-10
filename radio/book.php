<?php
session_start();
include("connect.php");
$time = mysqli_real_escape_string($con, $_GET['time']);
    if($_GET['dj']!=$_SESSION['username']){
        $dj = $_SESSION['username'];
    }
    else{
        $dj = mysqli_real_escape_string($con, $_GET['dj']);
    }
if(!empty($time)&&!empty($dj)){
    $time = explode('-', $time);
    $day = $time[0];
    $time = $time[1];
    $sql = "SELECT * FROM `timetable` WHERE `day`='".$day."' AND `time`='".$time."'";
    $result = mysqli_query($con, $sql);    
        while($row = mysqli_fetch_array($result)){
            if(!empty($row['dj'])&&$row['dj']!=$dj){
                echo 'This slot has already been taken';
                }
            else{
                if($row['dj']==$dj){
                    $sql = "UPDATE `timetable` SET `dj`='' WHERE `day`='".$day."' AND `time`='".$time."'";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_affected_rows($con)>0){
                        echo 'Updated successfully :3<br>
                        <a href="timetable.php">Click here to return</a>';
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
                else{
                    $sql = "UPDATE `timetable` SET `dj`='".$dj."' WHERE `day`='".$day."' AND `time`='".$time."'";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_affected_rows($con)>0){
                        echo 'Updated successfully :3<br>
                        <a href="timetable.php">Click here to return</a>';
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }
        }
    }
else{
    echo 'Tralala';
    }
?>