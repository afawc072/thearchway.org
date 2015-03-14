<html>
<body>

<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location:/archway/profile.html');
}

//declaring variable
$input = $_POST['coursetoadd'];

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
if(preg_match('/([A-Za-z]{3})([0-9]{4})/', $input)){

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

}

//This counts the number or results – and if there wasn’t any it gives a little message explaining that
$anymatches=mysql_num_rows($data);
if ($anymatches == 0)
{

echo "IT WORKS"
$sql = "INSERT INTO Course (cname) VALUES ($input)";
mysql_query($sql, $conn) or die(mysql_error());
}



//input not null and not a cid...
else{

echo "<p>Sorry, your search: &quot;" . $input . "&quot; is already ENTER THE RIGHT SHIT</p>";

}

$anymatches = mysql_num_rows($data);

if ($anymatches == 0){

$sql = "INSERT INTO Course (cname) VALUES ($input)";

}


?>
</body>
</html>

