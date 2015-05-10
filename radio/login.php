<?php session_start();?>
<html>
<head>
</head>
<body>
<form action="" method="post">
<input type="text" name="username"><br>
<input type="submit" name="login" value="Login">
<?php
if(!empty($_POST['login'])){
$_SESSION['logged_in'] = 1;
$_SESSION['username'] = $_POST['username'];
echo '<a href="logout.php">Click here to logout</a>';
}
?>
</body>
</html>