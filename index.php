
<!DOCTYPE html>
<html>
<head>
<?php session_start() ?>
<title>The Archway</title>
<link rel="search" href="/opensearch.xml" type="application/opensearchdescription+xml" title="Archway Search" />
<link rel="icon" type="image/ico" href="favicon.ico">
<?php include ("templates/header.php"); ?>

</head>
<body>
<center>
<img src="images/archwaylogo.png" width="45%" height="45%"/>
</center> 


<center><form name="input" action="search.php" method="post">
<div><input type="text" name="find" value=""/></div> 
<div><input type="submit" value="Submit"/></div>
</form></center>

<center><p class="generic">The Archway is a free and powerful platform that helps you share courses-related documents</p></center>
<center><p class="generic" style="font-size: 13px;" id="stats">Our database contains 0 assignments, 0 course notes and 0 exams.</p></center>
<center><?php

$myFile = "stats/coursesStats.txt";
$fh = fopen($myFile, 'r');
while(!feof($fh))
{
    $data[] = fgets($fh);     
 //Do whatever you want with the data in here
    //This feeds the file into an array line by line
}
print_r($data[2]);
fclose($fh);

?></center>



<center><div class="footer">
<p class="generic" style="font-size: 12px;"><a href="index.html">Search | </a> <a href="profile.html">Profile | </a> <a href="about.php">Help | </a><a href="logout.php">Logout |</a> <a href="upload/upload.php"> Upload </a>
 <br/><br/></a></p>
&copy; 2014 The Archway</div></center>


</body>
</html>
