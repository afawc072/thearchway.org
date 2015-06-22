<?php

	session_start();
	require "db_connect.php";

$email=$_POST['name'];
$password=$_POST['pwd'];

$password=encrypt($password);

$resultlogin = mysql_query("SELECT * FROM Users WHERE email = '$email' AND password = '$password';") or die (mysql_error());
$num_row_login= mysql_num_rows($resultlogin);

if( $num_row_login >= 1){
while($row_login = mysql_fetch_array($resultlogin))
{
$_SESSION['username']=$row_login["username"];
$_SESSION['email']=$row_login["email"];

}
echo 1;
}
else {
	echo 'false';
}


function encrypt($pass){
require "variables/variables.inc.php";
$pass_hash1 = md5($pass . $salt1);
$passFinal = sha1($salt2 . $pass_hash1);

return $passFinal;

}

?>
