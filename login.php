<html>
	<body>
	<?php
	require "db_connect.php";
	// $con = mysql_connect("localhost","admin","vincentdb")or die(mysql_error());
		
	// 	if (!$con)
	// 	  {
	// 	  echo"No Connection";
	// 	  die('Could not connect: ' . mysql_error());
	// 	  }
		 
	// 	mysql_select_db("archway1", $con); 





$email=$_POST['user'];
$password=$_POST['pass'];


$key = FALSE;
$result = mysql_query("SELECT * FROM Users WHERE email = '$email' AND password = '$password' " , $con);
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
