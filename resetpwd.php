<?php

session_start();
require "db_connect.php";

//VARIABLES
$email=$_SESSION['email'];
$password=$_POST['passwordInput'];
$tbl_name="Users";

//to ensure that the user went through the confirmation, we look that the email is not empty.
if(isset($password)){

	$password=encrypt($password);

	$sql="UPDATE $tbl_name SET registered='f',password='$password' WHERE email='$email'";
	$result=mysql_query($sql);

	if($result){
		session_destroy();
		header('Location:/index.php');
	}

}

function encrypt($pass){

    require "variables/variables.inc.php";
    $pass_hash1 = md5($pass . $salt1);
    $passFinal = sha1($salt2 . $pass_hash1);

  return $passFinal;

}
?>