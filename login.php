<html>
	<body>
	<?php
	require "db_connect.php";

$email=$_POST['user'];
$password=$_POST['pass'];

$password=encrypt($password);

$key = FALSE;
$result = mysql_query("SELECT * FROM Users WHERE email = '$email' AND password = '$password' ");
while($row = mysql_fetch_array($result))
{
session_start();
$_SESSION['username']=$row["username"];
$_SESSION['email']=$row["email"];


$key=TRUE;	
}
	

if ($key == FALSE){
	session_unset();
}

function encrypt($pass){
require "variables/variables.inc.php";
$pass_hash1 = md5($pass . $salt1);
$passFinal = sha1($salt2 . $pass_hash1);

return $passFinal;

}

?>
</body>
</html>
