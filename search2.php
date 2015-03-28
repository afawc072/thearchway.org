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

<div class="container" style="min-height: 950px; height: auto !important; margin: 0 auto -100px;">

    <div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">

    <?php include ("templates/header.php"); ?>

    <div class="container">

<?php

//declaring variable
$input = $_POST['searchCourse'];

$conn = mysql_connect("localhost", "admin", "vincentdb") or die(mysql_error());
//select database
mysql_select_db("archway1", $conn);

//filtering input for xss and sql injection
$input = strip_tags( $input );
$input = mysql_real_escape_string( $input );
$input = trim( $input );

if(preg_match('/([A-Za-z]{3})([0-9]{4})/', $input)){

}

$sql1 = "SELECT cname FROM Course WHERE cname  LIKE '%$input%';";
$data = mysql_query($sql1, $conn) or die(mysql_error());
$result = mysql_fetch_array($data);
$anymatches=mysql_num_rows($data);


else if (preg_match('^[A-Za-z0-9]+$', $input) &&  $anymatches!=0) {
    $courseList="";
    while ($result = mysql_fetch_array($data)) {

        $info = $result['cname'];

        $path = "upload/uploadedFiles/".$info;
        
        if(is_dir ($path){
             if ($handle = opendir($path)) {
                while (false !== ($file = readdir($handle))) {

                    if ($file != "." && $file != ".." && (preg_match('/^.*\.('.$imp.')$/i', $file)))
                        {
                            $tempp= $path."/".$file;
                             
                                $thelist .= '<li><a href="'.$tempp.'">'.$file.'</a></li>';
                                $thelist .= file_get_contents($tempp.".description");
                                $thelist .= '<br> </br>';

                        }
                    }
                        closedir($handle);
                        mysql_close($conn);
                }
            }
        }
        echo "List of files for ".$input.":";
        echo $thelist;
        }
        ?>

            </div>
        </div>
    </div>
    <?php include ("templates/footer.php"); ?>

</body></center>
</html> 