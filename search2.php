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




                    <?php
                    ini_set('display_errors', 'On');
                    //declaring variable
                    $input = $_POST['searchCourse'];

                    $conn = mysql_connect("localhost", "admin", "vincentdb") or die(mysql_error());
                    //select database
                    mysql_select_db("archway1", $conn);

                    //filtering input for xss and sql injection
                    $input = strip_tags( $input );
                    $input = mysql_real_escape_string( $input );
                    $input = trim( $input );

                    $sql1 = "SELECT cname FROM Course WHERE cname  LIKE '%$input%';";
                    $data = mysql_query($sql1, $conn) or die(mysql_error());
                    $result = mysql_fetch_array($data);
                    $anymatches=mysql_num_rows($data);

                    if(preg_match('/([A-Za-z]{3})([0-9]{4})/', $input)){

                    } 

                    else if (preg_match('/^[A-Za-z0-9]+$/', $input) &&  $anymatches!=0) {

                    echo'<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">';
                    include ("templates/header.php");
                    echo '<div class="container" style="min-height: 850px;height: auto !important; margin: 0 auto -100px;">';

                    echo '<div style="padding-bottom: 200px;">';
                    echo '<div class="example">';
                    echo '<table class="table striped bordered hovered">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th class="text-left">Courses</th>';
                    echo '<th class="text-left">Document(s) added</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                         $courseList = "";

                        while ($courseFetcher = mysql_fetch_array($data)) {



                                $courseList .= '<li><a href="">'.$courseFetcher['cname'].'</a></li><br>';
                                echo '<tr class=""><td>'.$courseFetcher['cname'].'</td></tr>';
                            
                            
                            }
                            mysql_close($conn);

                                echo'</tbody>';
                                echo '</table>';
                            }
                            else
                            {
                                echo '<div class="container" style="min-height: 950px; height: auto !important; margin: 0 auto -100px;">';

                                echo '<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">';

                                include ("templates/header.php");

                                echo '<div class="container" style="margin-top: 50px;">';

                                echo "<p class='generic' style='color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;'><b>Search /</b> No results</p>";


                                echo "<p style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;'>Unfortunately, <span style='color: #00A255;'>$input</span> did not return any document or course. For tips on how to find the ressources you are looking for, </p>";
                        
                   

                            }
                            ?>
            </div>
        </div>
            </div>
            <?php include ("templates/footer.php"); ?>
        </div>
    </div>

</body></center>
</html> 