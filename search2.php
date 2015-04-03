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

                    //Querying for all courses that are LIKE input
                    $sql1 = "SELECT cname FROM Course WHERE cname  LIKE '%$input%';";
                    $data = mysql_query($sql1, $conn) or die(mysql_error());
                    $result = mysql_fetch_array($data);
                    $anymatches=mysql_num_rows($data);


                    /****************************************
                    *                 [IF]                  *
                    *       Input is a EXACT course         *
                    *   name, return the files uploaded     *
                    *         in its specific folder        *
                    *                                       *
                    *****************************************/
                    if(preg_match('/([A-Za-z]{3})([0-9]{4})/', $input) && $anymatches!=0){

                        $exactCourse = $result['cname'];
                        //Setting the path to documents
                        $path = "upload/uploadedFiles/".$exactCourse;
                        $pathtotal= $path."*";
                        
                        //If a folder has been created already
                        if(is_dir($path)){


                        echo'<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">';
                        include ("templates/header.php");
                        echo '<div class="container" style="min-height: 800px;height: auto !important; margin: 0 auto -100px;">';
                        echo '<div style="padding-bottom: 200px;">';


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


                        }
                        echo "List of files for ".$input.":";
                        echo $thelist;
                    }

                    //If no folders have been created (no files were uploaded)
                    else{

                        echo '<div class="container" style="min-height: 950px; height: auto !important; margin: 0 auto -100px;">';
                        echo '<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">';

                        include ("templates/header.php");

                        echo '<div class="container" style="margin-top: 50px;">';
                        echo "<p class='generic' style='color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;'><b>$exactCourse /</b> No documents uploaded yet ...</p>";
                        echo "<p style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;'>Unfortunately, this course does not contain any document at the moment. If you have notes related to this class and you wish to contribute, we encourage you to post them from our <a href='upload.php' style='color: #00A255;'>upload page</a>.</p>";
                        echo "<br>";
                        echo "<p style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;'>For tips on how to find the ressources you are looking for, please visit our <a href='help.php' style='color: #00A255;'>help page</a>.</p>"; 
                        echo "</div>";
                    }
                    }

                    /****************************************
                    *               [ELSE IF]               *
                    *     Input is found within courses     *
                    *      names, return these courses      *
                    *                                       *
                    *****************************************/
                    else if (preg_match('/^[A-Za-z0-9]+$/', $input) &&  $anymatches!=0) {

                    echo'<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">';
                    include ("templates/header.php");
                    echo '<div class="container" style="min-height: 850px;height: auto !important; margin: 0 auto -100px;">';

                    echo '<div style="padding-bottom: 200px; margin-top: 50px;">';
                    echo '<div class="example" style="background-color: rgba(239, 246, 238, 0) !important;">';
                    echo "<legend><b>Search / </b><span style='color: #00A255;'>$input</span></legend>";
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

                        $fileCount = 0;
                        $exactCourse = $result['cname'];
                        //Setting the path to documents
                        $path = "upload/uploadedFiles/".$exactCourse;
                        $pathtotal= $path."*";
                        
                        //If a folder has been created already
                        if(is_dir($path)){
                            $except = array("doc", "docx", "odt", "ppt", "pdf");
                            $imp = implode('|', $except);

                            if($path != "." && $path != ".." ){
                                if ($handle = opendir($path)) {
                                    while (false !== ($file = readdir($handle))) {

                                         if ($file != "." && $file != ".." && (preg_match('/^.*\.('.$imp.')$/i', $file)))
                                        {
                                            $fileCount++;
                                        }
                                    }
                                }
                            }
                        }



                                $courseList .= '<li><a href="">'.$courseFetcher['cname'].'</a></li><br>';
                                echo '<tr class=""><td>'.$courseFetcher['cname'].'</td><td>'.$fileCount.'</td></tr>';
                                          
                            }
                            mysql_close($conn);

                                echo'</tbody>';
                                echo '</table>';
                                echo '</div>';
                            }

                    /****************************************
                    *                 [ELSE]                *
                    *     Return all files that match       *
                    *               the input               *
                    *                                       *
                    *****************************************/
                            else
                            {
                                echo '<div class="container" style="min-height: 950px; height: auto !important; margin: 0 auto -100px;">';
                                echo '<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">';

                                include ("templates/header.php");

                                echo '<div class="container" style="margin-top: 50px;">';
                                echo "<p class='generic' style='color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;'><b>Search /</b> No results</p>";
                                echo "<p style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;'>Unfortunately, <span style='color: #00A255;'>$input</span> did not return any document or course.</p>";
                                echo "<br>";
                                echo "<p style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;'>For tips on how to find the ressources you are looking for, please visit our <a href='help.php' style='color: #00A255;'>help page</a>.</p>"; 
            
                                echo ' </div>';
                            }
                            ?>
        
        </div>
        </div>
        <?php include ("templates/footer.php"); ?>
    </div>
    </div>

</body></center>
</html> 