<?php

require "db_connect.php";

// Passkey that got from link
$passkey=$_GET['passkey'];

$tbl_name1="temp_members_db";

// Retrieve data from table where row that match this passkey
$sql1="SELECT * FROM $tbl_name1 WHERE confirm_code ='$passkey'";
$result1=mysql_query($sql1);

// If successfully queried
if($result1){

// Count how many row has this passkey
$count=mysql_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_members_db"
if($count==1){

$rows=mysql_fetch_array($result1);
$name=$rows['name'];
$email=$rows['email'];
$password=$rows['password'];

$tbl_name2="Users";

// Insert data that retrieves from "temp_members_db" into table "Users"
$sql2="INSERT INTO $tbl_name2(username, email, password, registered)VALUES('$name', '$email', '$password', 'f')";
$result2=mysql_query($sql2);
}

// if not found passkey, display message "Wrong Confirmation code"
else {
header('Location:/wcc.php');
}

// if successfully moved data from table"temp_members_db" to table "Users" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
if($result2){

header('Location:/welcome.php');

// Delete information of this user from table "temp_members_db" that has this passkey
$sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'";
$result3=mysql_query($sql3);

}

}
?>
