<?php
if(isset($_POST['country'])){
    $time = 5;
    $country = $_POST['country'];
    $notembedded = array('CA', 'US');
    if(in_array($country, $notembedded)){
        setcookie('embed', 0, time()+$time);
    }
    else{
        setcookie('embed', 1, time()+$time);
    }
    }
else{
    header("Location: index.php");
}
?>