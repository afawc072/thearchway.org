<html>
	<body>
	<?php
	require "db_connect.php";

$email=$_POST['user'];
$password=$_POST['pass'];

$pass=encrypt($password);

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

function encrypt($pass){
require "variables/variables.inc.php";
echo $salt1;
echo $salt2;
$pass_hash1 = md5($pass . $salt1);
echo $pass_hash1;
$passFinal = sha1($salt2 . $pass_hash1);
echo $passFinal;

return $passFinal;

}

?>
</body>
</html>
