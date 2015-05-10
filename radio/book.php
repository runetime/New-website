<?php
session_start();
include("connect.php");
<<<<<<< HEAD
/*Get data from URL and process it, check if DJ in URL is the currently logged in one*/
=======
>>>>>>> e1cc3ebf491105d0f5e709949a3a500aa0731bb7
$time = mysqli_real_escape_string($con, $_GET['time']);
    if($_GET['dj']!=$_SESSION['username']){
        $dj = $_SESSION['username'];
    }
    else{
        $dj = mysqli_real_escape_string($con, $_GET['dj']);
    }
<<<<<<< HEAD
/*Start booking time if both time and dj are set*/
if(!empty($time)&&!empty($dj)){
    /*Alter time to be useable in SQL query*/
    $time = explode('-', $time);
    $day = $time[0];
    $time = $time[1];
    /*Check if time isn't taken yet*/
    $sql = "SELECT * FROM `timetable` WHERE `day`='".$day."' AND `time`='".$time."'";
    $result = mysqli_query($con, $sql);    
        while($row = mysqli_fetch_array($result)){
            /*If already taken cancel and throw error*/
=======
if(!empty($time)&&!empty($dj)){
    $time = explode('-', $time);
    $day = $time[0];
    $time = $time[1];
    $sql = "SELECT * FROM `timetable` WHERE `day`='".$day."' AND `time`='".$time."'";
    $result = mysqli_query($con, $sql);    
        while($row = mysqli_fetch_array($result)){
>>>>>>> e1cc3ebf491105d0f5e709949a3a500aa0731bb7
            if(!empty($row['dj'])&&$row['dj']!=$dj){
                echo 'This slot has already been taken';
                }
            else{
<<<<<<< HEAD
                /*If the dj is already set for the timeslot delete*/
=======
>>>>>>> e1cc3ebf491105d0f5e709949a3a500aa0731bb7
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
<<<<<<< HEAD
                /*If the dj isn't already set for the timeslot put him there*/
=======
>>>>>>> e1cc3ebf491105d0f5e709949a3a500aa0731bb7
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