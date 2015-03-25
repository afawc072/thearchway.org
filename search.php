<!DOCTYPE html>
    <html style="">

    <head>

<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location:/archway/profile.html');
} 
?>
    <link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="iconFont.css" rel="stylesheet">
    <link href="docs.css" rel="stylesheet">
    <link href="prettify.css" rel="stylesheet">

    <script src="jquery.min.js"></script>
    <script src="jquery.widget.min.js"></script>
    <script src="jquery.mousewheel.js"></script>
    <script src="prettify.js"></script>

    <script src="load-metro.js"></script>

    <script src="docs.js"></script>
    <script src="github.info.js"></script>
    <script src="start-screen.js"></script>

    </head>

    <body class="metro">

<script></script>

<noscript></noscript>

<div class="container" style="min-height: 100%; height: auto !important; height: 100%; ma
rgin: 0 auto -100px;">

    <div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" sty
le="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display:
inline-block; outline-style: none;">

    <?php include ("templates/header.php"); ?>

    <div class="container" style="margin-top: 50px;">

 <p class="generic" style="color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sa
ns,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55
em;">


<?php


//declaring variable
$input = $_POST['searchCourse'];

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
// echo "<br><b>$title</b>";
// echo "<br>$info<br>";
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

  //This counts the number or results – and if there wasn’t any it gives a little message explaining that

$anymatches=mysql_num_rows($data);
if ($anymatches == 0)
{
echo "<p>Sorry, &quot;" . $input . "&quot; doesn't exist in our database</p>";


}
if($thelist=="" && $anymatches == 1){
echo "No files have yet been uploaded to ".$input;


}
if($thelist!="" && $anymatches == 1){
echo "List of files for ".$input.":";
echo $thelist="";
}

}

}
//Condition if the search is made and doesn't contain the exact string content of a Course
else{

$thelist2;

$sql = "SELECT courseFile,path FROM Files WHERE courseFile  LIKE '%$input%';";

//execute the statement
$data = mysql_query($sql, $conn) or die(mysql_error());
while ($result = mysql_fetch_array($data)) {
    //giving names to the fields
    //$title = $result['cid'];
    $file = $result['courseFile'];
    //put the results on the screen
    $path = $result['path'];
    $thelist2 .= '<li><a href="'.$path.'">'.$file.'</a></li>';
    $thelist2 .= '<br> </br>';
}
  echo $thelist2;

}
?>
</p>

                </div>
            </div>
        </div>

            <?php include ("templates/footer.php"); ?>


</body>
</html>

