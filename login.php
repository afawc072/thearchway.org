<?php

	session_start();
	require "db_connect.php";

$email=$_POST['name'];
$password=$_POST['pwd'];

$password=encrypt($password);

$result = mysql_query("SELECT * FROM Users WHERE email = '$email' AND password = '$password' ") or die (mysql_error());
$num_row= mysql_num_rows($result);
if( $num_row >= 1){
while($row = mysql_fetch_array($result))
{
$_SESSION['username']=$row["username"];
$_SESSION['email']=$row["email"];

}
echo 'true';
}
} else {
	echo 'false';
}


function encrypt($pass){
require "variables/variables.inc.php";
$pass_hash1 = md5($pass . $salt1);
$passFinal = sha1($salt2 . $pass_hash1);

return $passFinal;

}

?>
