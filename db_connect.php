<?php
global $dbname;
require "variables/dbconnect.inc.php";

 // Connects to Our Database 
 $con = mysql_connect($host, $dbuser, $dbpass)or die(mysql_error()); 
 mysql_select_db($dbname,$con);

$con = mysql_connect($host,$dbuser,$dbpass)or die(mysql_error());
		
if (!$con)
 	  {
 	  echo"No Connection";
	  die('Could not connect: ' . mysql_error());
 	  }
		 
 	mysql_select_db($dbname, $con); 
 ?> 