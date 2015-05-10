<?php
session_start();
session_destroy();
echo '<a href="login.php">Click here to login again</a>';
?>