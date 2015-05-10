<?php
if(isset($_POST['country'])){
<<<<<<< HEAD
    $time = 60*60*24*30;
=======
    $time = 5;
>>>>>>> e1cc3ebf491105d0f5e709949a3a500aa0731bb7
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