<!DOCTYPE html>
    <html style="">

    <head>

<?php
header('Cache-Control: max-age=900');
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

                        //Querying for all files from courses that are LIKE input
                        $sqlFiles = "SELECT fromCourse, courseFile, description, path, reg_date FROM Files WHERE fromCourse LIKE '%$exactCourse%' ORDER BY reg_date DESC;";
                        $dataFiles = mysql_query($sqlFiles, $conn) or die(mysql_error());
                        $anymatchesFiles =mysql_num_rows($dataFiles);
                        
                        //If a folder has been created already
                        if(is_dir($path) && $anymatchesFiles != 0){


                        echo'<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">';
                        include ("templates/header_sb.php");
                        echo '<div class="container" style="min-height: 795px;height: auto !important; margin: 0 auto -100px;">';

                        echo '<div style="padding-bottom: 200px; margin-top: 154px;">';

                        echo "<p class='generic' style='color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;'><b>Download /</b> $exactCourse  </p>";

                        echo"<div class='listview-outlook' data-role='listview' style='margin-top: 20px'>";
                        echo"<div class='list-group '>";
                        echo"<a href='' class='group-title'>Available files</a>";
                        echo"<div class='group-content'>";


                            if($path != "." && $path != ".." ){

                              if ($handle = opendir($path)) {
                                while($fileFetcher = mysql_fetch_array($dataFiles)){
                                    $file = $fileFetcher['courseFile'];
                                    $description = $fileFetcher['description'];
                                    $filePath = $fileFetcher['path'];
                                    $uploadDate = substr($fileFetcher['reg_date'], 0, strrpos($fileFetcher['reg_date'], ' '));



                                    if(file_exists($filePath)){

                                    $tempp="download.php?download_file=".$file;
                                
                                    if (!is_null($description)){
                                        echo"<a class='list marked' href='".$tempp."'>";
                                        echo"<div class='list-content'>";
                                        echo"<span class='list-title'>$file</span>";
                                        echo"<span class='list-subtitle'>".$uploadDate."</span>";
                                        echo"<span class='list-remark'>".$description."</span>";
                                        echo"</div>";
                                        echo"</a>"; 

                                       }
                                    else{
                                        echo"<a class='list marked' href='".$tempp."'>";
                                        echo"<div class='list-content'>";
                                        echo"<span class='list-title'>$file</span>";
                                        echo"<span class='list-subtitle'>".$uploadDate."</span>";
                                        echo"</div>";
                                        echo"</a>";
                                        }
                                    }

                                  
                                }
                            }
                                mysql_close($conn);
                                closedir($handle);
                              }


                            
                            echo"</div>";
                            echo"</div>";
                            echo"</div>";

                        }

                    //If no folders have been created (no files were uploaded)
                    else{

                        echo '<div class="container" style="min-height: 950px; height: auto !important; margin: 0 auto -100px;">';
                        echo '<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">';

                        include ("templates/header_sb.php");

                        echo '<div class="container" style="margin-top: 154px;">';
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
                    include ("templates/header_sb.php");
                    echo '<div class="container" style="min-height: 795px;height: auto !important; margin: 0 auto -100px;">';

                    echo '<div style="padding-bottom: 200px; margin-top: 154px;">';
                    echo '<div class="example" style="background-color: rgba(239, 246, 238, 0) !important; margin: 0px 0px 0px;">';
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
                         $sql1 = "SELECT cname FROM Course WHERE cname  LIKE '%$input%';";
                         $data = mysql_query($sql1, $conn) or die(mysql_error());

                        while ($courseFetcher = mysql_fetch_array($data)) {

                         $exactCourse = $courseFetcher['cname'];
                         echo $exactCourse;
                        //Querying for all files from courses that are LIKE input
                        $sqlNbrFiles = "SELECT fromCourse FROM Files WHERE fromCourse  LIKE '%$exactCourse%';";
                        $dataNbrFiles = mysql_query($sqlNbrFiles, $conn) or die(mysql_error());
                        $fileCount =mysql_num_rows($dataNbrFiles);
                        //Setting the path to documents
                        $path = "upload/uploadedFiles/".$exactCourse;
                        $pathtotal= $path."*";
                        



                                
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

                                //Querying for all courses that are LIKE input
                                $sqlFiles = "SELECT fromCourse, courseFile, description, path, reg_date FROM Files WHERE ((courseFile LIKE '%$input%') OR (description LIKE '%$input%')) ORDER BY fromCourse, reg_date DESC;";
                                $dataFiles = mysql_query($sqlFiles, $conn) or die(mysql_error());
                                $anymatchesFiles =mysql_num_rows($dataFiles);

                                 //If a folder has been created already
                            if($anymatchesFiles != 0){


                            echo'<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">';
                            include ("templates/header_sb.php");
                            echo '<div class="container" style="min-height: 795px;height: auto !important; margin: 0 auto -100px;">';

                            echo '<div style="padding-bottom: 200px; margin-top: 154px;">';

                            echo "<p class='generic' style='color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;'><b>Downloads matching keyword /</b> $input </p>";

                            echo"<div class='listview-outlook' data-role='listview' style='margin-top: 20px'>";



                                 $flagCourse = "";
                                    while($fileFetcher = mysql_fetch_array($dataFiles)){
                                        $file = $fileFetcher['courseFile'];
                                        $description = $fileFetcher['description'];
                                        $filePath = $fileFetcher['path'];
                                        $exactCourse = $fileFetcher['fromCourse'];
                                        $uploadDate = substr($fileFetcher['reg_date'], 0, strrpos($fileFetcher['reg_date'], ' '));

                                        if(($flagCourse == "")){
                                            echo"<div class='list-group '>";
                                            echo"<a href='' class='group-title'>$exactCourse</a>";
                                            echo"<div class='group-content'>";

                                            $flagCourse = $exactCourse;
                                        } 

                                        else if(($flagCourse != $exactCourse)){

                                            echo"</div>";
                                            echo"</div>";
                                            echo"<div class='list-group '>";
                                            echo"<a href='' class='group-title'>$exactCourse</a>";
                                            echo"<div class='group-content'>";

                                            $flagCourse = $exactCourse;
                                        }
                                        //Setting the path to documents
                                        $path = "upload/uploadedFiles/".$exactCourse;

                                        if(file_exists($filePath)){

                                        $tempp= $path."/".$file;
                                    
                                        if (!is_null($description)){
                                            echo"<a class='list marked' href='".$tempp."'>";
                                            echo"<div class='list-content'>";
                                            echo"<span class='list-title'>$file</span>";
                                            echo"<span class='list-subtitle'>".$uploadDate."</span>";
                                            echo"<span class='list-remark'>".$description."</span>";
                                            echo"</div>";
                                            echo"</a>"; 

                                           }
                                        else{
                                            echo"<a class='list marked' href='".$tempp."'>";
                                            echo"<div class='list-content'>";
                                            echo"<span class='list-title'>$file</span>";
                                            echo"<span class='list-subtitle'>".$uploadDate."</span>";
                                            echo"</div>";
                                            echo"</a>";
                                            }
                                        }
                                       

                                      
                                    }
                                
                                    mysql_close($conn);
                                    
                                  


                                
                                echo"</div>";
                                echo"</div>";
                                echo"</div>";

                            } else{



                                    echo '<div class="container" style="min-height: 950px; height: auto !important; margin: 0 auto -100px;">';
                                    echo '<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">';

                                    include ("templates/header_sb.php");

                                    echo '<div class="container" style="margin-top: 154px;">';
                                    echo "<p class='generic' style='color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;'><b>Search /</b> No results</p>";
                                    echo "<p style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;'>Unfortunately, <span style='color: #00A255;'>$input</span> did not return any document or course.</p>";
                                    echo "<br>";
                                    echo "<p style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;'>For tips on how to find the ressources you are looking for, please visit our <a href='help.php' style='color: #00A255;'>help page</a>.</p>"; 
                
                                    echo ' </div>';
                                }
                            }

                            ?>
        
        </div>
        </div>
        <?php include ("templates/footer.php"); ?>
    </div>
    </div>

</body></center>
</html> 