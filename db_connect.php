<?php
global $dbname;
require "variables/dbconnect.inc.php";

 // Connects to Our Database 
 $con = mysql_connect($host, $dbuser, $dbpass)or die(mysql_error()); 
 mysql_select_db($dbname,$con);

 ?> 