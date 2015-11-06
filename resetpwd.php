<?php

session_start();

//VARIABLES
$email=$_SESSION['email'];
$password=$_POST['passwordInput'];
$tbl_name="Users";

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