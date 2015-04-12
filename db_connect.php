<?php
include("variables/dbconnect.inc.php");

 // Connects to Our Database 
 mysql_connect($host, $dbuser, $dbpass) or die(mysql_error()); 
 mysql_select_db($dbname) or die(mysql_error()); 
 $result = mysql_query("SELECT * FROM Users WHERE email = '$email' AND password = '$password' ");
echo $result;
 ?> 