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

    <script type="text/javascript">

    $(document).ready(function() {
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

    </head>

<body class="metro" style="height: 100%;">

<script></script>

<noscript></noscript>
<?php include ("templates/header.php"); ?>
<div class="container">

        <div class="example" style="padding-top : 20px;">
            <form action="upload/upload_file.php" method="post"
             enctype="multipart/form-data">
                <fieldset>
                    <legend>Upload your notes</legend>
                    <label>File</label>
                    <div class="input-control file" data-role="input-control">
                        <input type="file" name="file">
                        <button class="btn-file"></button>
                    </div>
                    <label for="course">Course</label>
                    <div class="input-control select">
                        <!--<select name='course'>-->
                            <?php

                                //open connection
                                $conn = mysql_connect("localhost","admin","vincentdb") or die(mysql_error());
                                //select database
                                mysql_select_db("archway1", $conn);
                                $query = "SELECT * FROM Course ORDER BY cname"; //You don't need a ; like you do in SQL
                                $result = mysql_query($query);

                                echo "<select name= 'course'>";// start a table tag in the HTML
                                echo '<option value="">'.'--Select Course--'.'</option>';
                                while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
                                    echo "<option value='". $row['cname'] . "'>".$row['cname'] .'</option>';
                                }

                                echo '</select>';
                                mysql_close(); //Make sure to close out the database connection

                            ?>
                            </select>
                    </div>
                    

                    <label>Description</label>
                    <div class="input-control textarea">
                        <textarea name="details" id="details" data-transform="input-control" placeholder="This is optional..."></textarea>
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
                    </div>

                </fieldset>
            </form>
        </div>


<a href="add_course.php"> Can't find a course? </a>

</body></center>
</html> 
