<?php
require "/var/www/db_connect.php";

$resultU = mysql_query("select user, count(*) as occurences from Files group by user order by occurences desc, user limit 3;");
$resultC = mysql_query("select fromCourse, count(*) as occurences from Files group by fromCourse order by occurences desc, user limit 3;");
$resultS = mysql_query("select date(reg_date), count(*) as occurences from search group by date(reg_date);");
$resultD = mysql_query("select date(reg_date), count(*) as occurences from download group by date(reg_date);");
$resultUsers = mysql_query("select date(reg_date), count(*) as occurences from Users group by date(reg_date);");
$resultUpload = mysql_query("select date(reg_date), count(*) as occurences from Files group by date(reg_date);");


while($row = mysql_fetch_array($resultC)){
        //$temp=$row[0];
        //$resultUser = mysql_query("select username from Users where email = '$temp' limit 1;");
        //$user = mysql_fetch_array($resultUser);
        //echo $row[0]. "<br>";

				}

$myFile = "/var/www/stats/searchStats.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
while($row = mysql_fetch_array($resultS)){
		$stringData = $row[0].",".$row[1]."\n";
		fwrite($fh, $stringData);



		}
fclose($fh);

$myFile2 = "/var/www/stats/dowloadStats.txt";
$fh2 = fopen($myFile2, 'w') or die("can't open file");
while($row = mysql_fetch_array($resultD)){
		$stringData = $row[0].",".$row[1]."\n";
		fwrite($fh2, $stringData);



		}
fclose($fh2);


$myFile3 = "/var/www/stats/uploadStats.txt";
$fh3 = fopen($myFile3, 'w') or die("can't open file");
while($row = mysql_fetch_array($resultUpload)){
		$stringData = $row[0].",".$row[1]."\n";
		fwrite($fh3, $stringData);



		}
fclose($fh3);

$myFile4 = "/var/www/stats/UserStats.txt";
$fh4 = fopen($myFile4, 'w') or die("can't open file");
while($row = mysql_fetch_array($resultUsers)){
		$stringData = $row[0].",".$row[1]."\n";
		fwrite($fh4, $stringData);



		}
fclose($fh4);

?>
