<html>
<body>

<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location:/archway/profile.html');
}

//declaring variable
$input = $_POST['coursetoadd'];
$input = strtoupper($input);


//If they did not enter a search term we give them an error
if ($input == "")
{
echo "<h3>You forgot to enter a search term!</h3></br>";
echo "<h3>Vous avez oubliez de rentrer un terme pour la recherche!</h3>";
exit;
}

//open connection
$conn = mysql_connect("localhost", "admin", "vincentdb") or die(mysql_error());
//select database
mysql_select_db("archway1", $conn);

//filtering input for xss and sql injection
$input = strip_tags( $input );
$input = mysql_real_escape_string( $input );
$input = trim( $input );

//the sql statement
if(preg_match('/([A-Z]{3})([0-9]{4})/', $input)){

$sql = "SELECT C.cname FROM Course as C  WHERE C.cname  LIKE '%$input%';";

//execute the statement
$data = mysql_query($sql, $conn) or die(mysql_error());
while ($result = mysql_fetch_array($data)) {
//giving names to the fields
//$title = $result['cid'];
$info = $result['cname'];
//put the results on the screen
$path = "/var/www/archway/upload/uploadedFiles/".$info;
$pathtotal= $path."*";

}

//If the course can't be found in the db, it is added to it
$anymatches=mysql_num_rows($data);
if ($anymatches == 0)
{
echo "IT WORKS";
$sql2 = "INSERT INTO Course (cname) VALUES ('$input')";
$result=mysql_query($sql2, $conn) or die(mysql_error());
mysql_close($conn);
}

//If the course is found
else{

echo "<p>Sorry, the Course &quot;" . $input . "&quot already exists on our Website</p>";

}


}
//In case the input doesn't contain the right number of strings

else{

echo "Not enough strings";

}

?>
</body>
</html>

