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
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/prettify/prettify.css" rel="stylesheet">
    <link href="css/smoothnessui.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>
    <script src="js/prettify/prettify.js"></script>
    <script src="js/holder/holder.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="js/docs.js"></script>
    <script src="js/github.info.js"></script>
    <script src="js/ga.js"></script>

    </head>

    <body class="metro">

<script></script>

<noscript></noscript>

                    <?php
                    ini_set('display_errors', 'On');
                    
                    //declaring variable
                    foreach ($_POST as $name => $value) {
                        $input = $value; // the same as echo $_POST['email'], in this case
                        }


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
                    echo '<div class="container" style="min-height: 795px;height: auto !important; margin: 0 auto -100px;">';

                    echo '<div style="padding-bottom: 200px; margin-top: 50px;">';

                     echo "<p class='generic' style='color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;'><b>Download /</b> $exactCourse  </p>";

                    echo"<div class='listview-outlook' data-role='listview' style='margin-top: 20px'>";
                    echo"<div class='list-group '>";
                    echo"<a href='' class='group-title'>Available files</a>";
                    echo"<div class='group-content'>";
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
                                    echo"<a class='list marked' href='".$tempp."'>";
                                    echo"<div class='list-content'>";
                                    echo"<span class='list-title'>$file</span>";
                                    echo"<span class='list-subtitle'>26/10/2013</span>";
                                    echo"<span class='list-remark'>".file_get_contents($tempp.".description")."</span>";
                                    echo"</div>";
                                    echo"</a>"; 

                                   }
                                else{
                                    echo"<a class='list' href='".$tempp."'>";
                                    echo"<div class='list-content'>";
                                    echo"<span class='list-title'>$file</span>";
                                    echo"<span class='list-subtitle'>26/10/2013</span>";
                                    echo"</div>";
                                    echo"</a>";
                                    }

                              }
                            }
                            closedir($handle);
                          }


                        }
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";

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
                    echo '<div class="container" style="min-height: 795px;height: auto !important; margin: 0 auto -100px;">';

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
                         $courseCount = 1;

                        while ($courseFetcher = mysql_fetch_array($data)) {

                        $fileCount = 0;
                        $exactCourse = $courseFetcher['cname'];
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
                                echo "<tr class=''><td><form style='margin:  0px 0px 0px;' name='courseForm".$courseCount."' action='search2.php' method='post'><a href='javascript:;' onclick='parentNode.submit();'>".$courseFetcher['cname']."</a><input type='hidden' name='".$courseCount."' value='".$courseFetcher['cname']."'/></form></td><td>".$fileCount."</td></tr>";

                                $courseCount++;
                                          
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