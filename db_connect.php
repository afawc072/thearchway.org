<?php
include("variables/dbconnect.inc.php");

 // Connects to Our Database 
 $conn=mysql_connect($host, $dbuser, $dbpass) or die(mysql_error()); 
 mysql_select_db($dbname,$conn) or die(mysql_error()); 
 ?> 