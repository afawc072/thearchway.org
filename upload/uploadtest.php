<!DOCTYPE html>
    <html style="">

    <head>

<?php session_start() ?>
    <link href="../css/metro-bootstrap.css" rel="stylesheet">
    <link href="../css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/iconFont.css" rel="stylesheet">
    <link href="../docs.css" rel="stylesheet">
    <link href="../prettify.css" rel="stylesheet">

    <script src="../jquery.min.js"></script>
    <script src="../jquery.widget.min.js"></script>
    <script src="../jquery.mousewheel.js"></script>
    <script src="../prettify.js"></script>

    <script src="../load-metro.js"></script>

    <script src="../docs.js"></script>
    <script src="../github.info.js"></script>
    <script src="../start-screen.js"></script>
    <script src="../scripts/loading.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
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
<?php include ("../templates/header.php"); ?>
<div class="container">



<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<label for="course" >Course:</label>

<select name= ' course'>
    <option value="1">--Select Course--</option>
    <option value="2">--Select Course--</option>
</select>

<input type="submit" name="submit" value="Upload">
</form>

        <div class="example">
            <form action="upload_file.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Upload your notes</legend>
                    <label>Filename</label>
                    <div class="input-control file" data-role="input-control">
                        <input type="file" name="file" id="file">
                        <button class="btn-file"></button>
                    </div>
                    <label>Course</label>
                    <div class="input-control select">
                        <select name='course'>
                            <option>--Select--</option>
                            <option>ELG123</option>
                            <option>CSI123</option>
                            <option>CVG123</option>
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
                    <input type="submit" value="Upload">
                    <input type="reset" value="Reset">

                    <div style="margin-top: 20px">
                    </div>

                </fieldset>
            </form>
        </div>


<a href="add_course.php"> Can't find a course? </a>

</body></center>
</html> 
