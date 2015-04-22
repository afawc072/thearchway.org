<?php
require "/var/www/archway/db_connect.php";

$resultU = mysql_query("select user, count(*) as occurences from Files group by user order by occurences desc, user limit 3;");
$resultC = mysql_query("select fromCourse, count(*) as occurences from Files group by fromCourse order by occurences desc, user limit 3;");
$resultS = mysql_query("select date(reg_date), count(*) as occurences from search group by date(reg_date);");
$resultD = mysql_query("select date(reg_date), count(*) as occurences from download group by date(reg_date);");
while($row = mysql_fetch_array($resultC)){
        //$temp=$row[0];
        //$resultUser = mysql_query("select username from Users where email = '$temp' limit 1;");
        //$user = mysql_fetch_array($resultUser);
        echo $row[0]. "<br>";

				}

$myFile = "searchStats.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
while($row = mysql_fetch_array($resultS)){
        //$temp=$row[0];
        //$resultUser = mysql_query("select username from Users where email = '$temp' limit 1;");
        //$user = mysql_fetch_array($resultUser);
		$stringData = $row[0].","$row[1]."\n";
		fwrite($fh, $stringData);
		fclose($fh);


		}
fclose($fh);

$myFile2 = "dowloadStats.txt";
$fh2 = fopen($myFile, 'w') or die("can't open file");
while($row = mysql_fetch_array($resultS)){
		$stringData = $row[0].","$row[1]."\n";
		fwrite($fh2, $stringData);
		fclose($fh2);


		}
fclose($fh2);

?>