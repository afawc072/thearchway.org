<?php

require "db_connect.php";


$result = mysql_query("select user, count(*) as occurences from Files group by user order by occurences desc, user limit 3;");

while($row = mysql_fetch_array($result)){
	echo $row;
}

?>