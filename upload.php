<!DOCTYPE html>
    <html>

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
    <script src="js/jquery/jqueryui.js"></script>
    <script src="js/prettify/prettify.js"></script>
    <script src="js/holder/holder.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="js/docs.js"></script>
    <script src="js/github.info.js"></script>
    <script src="js/ga.js"></script>

     <script>
        $(function() {
            var availableTags = [];
            <?php
                $phparray = array();
                 //open connection
                $conn = mysql_connect("localhost","admin","vincentdb") or die(mysql_error());
                //select database
                mysql_select_db("archway1", $conn);
                $query = "SELECT * FROM Course ORDER BY cname"; //You don't need a ; like you do in SQL
                $result = mysql_query($query);
                while(($row = mysql_fetch_assoc($result))){   //Creates a loop to loop through results
                    $phparray[] = $row['cname'];
                }
                $js_array = json_encode($phparray);
                echo "var availableTags = ". $js_array . ";\n";
                mysql_close(); //Make sure to close out the database connection
                ?>
                $( "#coursesInput" ).autocomplete({
                source: availableTags
                });
                window.availableTags = availableTags;
            });

    $(document).ready(function() {

        $("#uploadform form").addClass("load");
        //global vars of wars
        var form = $("#uploadform");
        var file = $("#file");
        var coursesInput = $("#coursesInput");
        var details = $("#details");
        var fileDiv = $("#fileDiv");
        var coursesInputDiv = $("#coursesInputDiv");



        coursesInput.keyup(validateFile);
        coursesInput.blur(validateFile);

        function validateFile(){
            //if it's NOT valid
            if(coursesInput.val().length == availableTags[0].length){
                coursesInputDiv.addClass("success-state");

                return false;
            }
            //if it's valid
            else{
                coursesInputDiv.removeClass("success-state");
                return true;
            }
        }


         $("#detailsgiven").change(function() {
            if($(this).is(":checked")) {                
              $("#details").removeAttr("disabled");
             }
            else {
              $("#details").attr("disabled", "disabled");
             }
        });

    });
    </script>

<style type="text/css">
    #uploadform form{
    opacity: 0;
    -webkit-transition: opacity 0.5s ease-in;
    -moz-transition: opacity 0.5s ease-in;
    -o-transition: opacity 0.5s ease-in;
    -ms-transition: opacity 0.5s ease-in;
    transition: opacity 0.5s ease-in;
    }
    #uploadform form.load {
    opacity: 1;
    }

    .footer, .push {
    height: 100px; /* .push must be the same height as .footer */
    }
.ui-autocomplete {
    max-height: 200px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
    /* add padding to account for vertical scrollbar */
    padding-right: 20px;
}

* html .ui-autocomplete {
    height: 200px;
}

</style>

    </head>

<body class="metro" style="height: 100%;">

<script></script>

<noscript></noscript>

<div class="container" style="min-height: 100%; height: auto !important; height: 100%; margin: 0 auto -100px;">

    <div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">

    <?php include ("templates/header.php"); ?>

    <div class="container">

        <div id="uploadform" name="uploadform" class="example" style="top: 50px;">
            <form action="upload/upload_file.php" method="post" id="uploadform"
             enctype="multipart/form-data">
                <fieldset>
                    <legend>Upload your notes</legend>
                    <label>File</label>
                    <div id="fileDiv" name="fileDiv"class="input-control file" data-role="input-control">
                        <input type="file" id="file" name="file">
                        <button class="btn-file"></button>
                    </div>
                    <label for="course">Course</label>


                    <div id="coursesInputDiv" name="coursesInputDiv" class="input-control text error-state" data-role="input-control">
                        <input id="coursesInput" name="coursesInput" type="text">
                    </div>
                    

                    <label>Description</label>
                    <div class="input-control textarea">
                        <textarea name="details" id="details" form="uploadform" data-transform="input-control" placeholder="This is optional..."></textarea>
                     </div>

                        <div class="input-control switch" data-role="input-control">
                            <label class="inline-block" style="margin-right: 20px">
                                Add description
                                <input type="checkbox" name="detailsgiven" id="detailsgiven" checked/>
                                <span class="check"></span>
                            </label>
                        </div>
                    
                    <br>
                    <input type="submit" name="submit" value="Upload">
                    <input type="reset" value="Reset">

                    <div style="margin-top: 20px">
                                    <a href="upload/add_course.php"> Can't find a course? </a>
                    </div>

                </fieldset>
            </form>
        </div>
        </div>

    </div>
    </div>
    <?php include ("templates/footer.php"); ?>

</body></center>
</html> 
