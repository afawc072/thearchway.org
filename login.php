<html>
	<body>
	<?php
	require "db_connect.php";

$email=$_POST['user'];
$password=$_POST['pass'];


$key = FALSE;
$result = mysql_query("SELECT * FROM Users WHERE email = '$email' AND password = '$password' ");
while($row = mysql_fetch_array($result))
{
session_start();
$_SESSION['username']=$row["username"];

header('Location:index.php');	

$key=TRUE;	
}
	

if ($key == FALSE){
	session_unset();
header('Location:login_error.html');
}



?>
</body>
</html>
