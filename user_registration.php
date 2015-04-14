<?php
//Get a DB connection
require "db_connect.php";
//Get variables from Registration Submit
$user=$_POST['user'];
$email=$_POST['email'];
$password1=$_POST['pass'];
$first=$_POST['first'];
$last=$_POST['last'];

//First Condition to verify if email is already contained in the DB
$key=FALSE;
$result = mysql_query("SELECT * FROM Users WHERE email = '$email'");
while($row = mysql_fetch_array($result))
{
$key=TRUE;	
}

//If email is not found in DB, then User is not found
if ($key == FALSE){

	$confirmCode=generate_random_string();
	$password=encrypt($password);
	$sql = "INSERT INTO Users (username, password, email, first, last, confirmCode) VALUES ('$user', '$password', '$email', '$first', '$last', '$confirmCode')";
	$result=mysql_query($sql, $conn) or die(mysql_error());
    
	//PLACE TO SEND CONFIRMATION CODE TO USER

    mysql_close($conn);
}
else{

	//User EXISTS IN DB

}


//Function to encrypt the password
function encrypt($pass){

	require "variables/variables.inc.php";
	$pass_hash1 = md5($pass . $salt1);
	$passFinal = sha1($salt2 . $pass_hash1);

	return $passFinal;

}

//function to generate random string as a confirmation code
function generate_random_string() {
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }


?>