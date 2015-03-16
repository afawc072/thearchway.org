<html>
<body>

<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location:/archway/profile.html');
}


//declaring variable
$input = $_POST['find'];

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
$path = "upload/uploadedFiles/".$info;
$pathtotal= $path."*";
echo "<br><b>$title</b>";
echo "<br>$info<br>";
}

$except = array("doc", "docx", "odt", "ppt", "pdf");
$imp = implode('|', $except);

if($path != "." && $path != ".." ){
$thelist="";
  if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
      
      if ($file != "." && $file != ".." && (preg_match('/^.*\.('.$imp.')$/i', $file))) 
       {
      	$tempp= $path."/".$file;
        if (file_exists($tempp.".description")){
            $thelist .= '<li><a href="'.$tempp.'">'.$file.'</a></li>';
            $thelist .= file_get_contents($tempp.".description");
            $thelist .= '<br> </br>';
           }
        else{        
          $thelist .= '<li><a href="'.$tempp.'">'.$file.'</a></li>';
          $thelist .= '<br> </br>';
            }
        
      }
    }
    closedir($handle);
  }

echo "List of files:";
echo $thelist;
}
//Fonction scandir (check if folder exists)
function is_dir_empty($dir) {
  if (!is_readable($dir)) return NULL; 
  return (count(scandir($dir)) == 2);
}

//This counts the number or results – and if there wasn’t any it gives a little message explaining that
$anymatches=mysql_num_rows($data);
if ($anymatches == 0)
{
echo "<p>Sorry, your search: &quot;" . $input . "&quot; returned zero results</p>";
echo "<p>Desole, votre recherche pour: &quot;" . $input . "&quot; a retourne aucun resultat</p>";
}
}

//nuLL input
else if($input ==''){
	
echo "0 Result</br>";
echo "0 Resultat";

}

//input not null and not a cid...
else{



$sql = "SELECT C.cid,C.cname FROM Course as C  WHERE C.cid  LIKE '%$input%';";

//execute the statement
$data = mysql_query($sql, $conn) or die(mysql_error());
while ($result = mysql_fetch_array($data)) {
//giving names to the fields
$title = $result['cid'];
$info = $result['cname'];
//put the results on the screen
$path = "upload/uploadedFiles/".$title;
$pathtotal= $path."*";
echo "<br>$title<br>";
echo "<br>$info<br>";
}

$anymatches = mysql_num_rows($data);

if ($anymatches == 0){

echo "0 Result</br>";
echo "0 Resultat";
}

}
?>
</body>
</html>

