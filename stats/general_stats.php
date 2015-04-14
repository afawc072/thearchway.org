<?php

require "/var/www/archway/db_connect.php";


$result = mysql_query("select user, count(*) as occurences from Files group by user order by occurences desc, user limit 3;");

while($row = mysql_fetch_array($result)){
        $temp=$row[0];
        $resultUser = mysql_query("select username from Users where email = '$temp';");
        $user = mysql_fetch_array($resultUser);
        echo $resultUser[0];
}

?>