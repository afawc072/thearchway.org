<?php 
include 'variables/dbconnect.inc.php';

 // Connects to Our Database 
 mysql_connect($host, $dbuser, $dbpass) or die(mysql_error()); 

		if (!$con)
		  {
		  echo"No Connection";
		  die('Could not connect: ' . mysql_error());
		  }
 mysql_select_db($dbname) or die(mysql_error()); 
 ?> 