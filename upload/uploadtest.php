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
            <form>
                <fieldset>
                    <legend>Post your notes</legend>
                    <label>Filename</label>
                    <div class="input-control text" data-role="input-control">
                        <input type="text" placeholder="type text" style=" width: 85%;"><input type="submit" name="submit" value="Upload" style="width: 15%">
                        
                    </div>
                    <label>Semester</label>
                    <div class="input-control text" data-role="input-control">
                        <input type="text">
                        <button class="btn-search"></button>
                    </div>
                    <div class="input-control text warning-state" data-role="input-control">
                        <input type="text" value="warning state">
                    </div>
                    <div class="input-control file" data-role="input-control">
                        <input type="file">
                        <button class="btn-file"></button>
                    </div>

                    <div class="input-control text error-state" data-role="input-control">
                        <input type="text" value="error state">
                    </div>
                    <div class="input-control text info-state" data-role="input-control">
                        <input type="text" value="info state">
                    </div>
                    <div class="input-control text success-state" data-role="input-control">
                        <input type="text" value="info state">
                    </div>

                    <div class="input-control checkbox" data-role="input-control">
                        <label class="inline-block">
                            <input type="checkbox" />
                            <span class="check"></span>
                            Check me out
                        </label>
                        <label class="inline-block">
                            <input type="checkbox" checked />
                            <span class="check"></span>
                            Check me out
                        </label>
                        <label class="inline-block">
                            Check me out
                            <input type="checkbox" disabled/>
                            <span class="check"></span>
                        </label>
                        <label class="inline-block">
                            Check me out
                            <input type="checkbox" disabled checked/>
                            <span class="check"></span>
                        </label>
                        <label class="inline-block">
                            Intermediate
                            <input type="checkbox" data-show="intermediate"/>
                            <span class="check"></span>
                        </label>
                    </div>

                    <div>
                        <div class="clearfix">
                        <div class="input-control radio inline-block" data-role="input-control">
                            <label class="inline-block">
                                <input type="radio" name="r1" checked />
                                <span class="check"></span>
                                R1
                            </label>
                            <label class="inline-block">
                                <input type="radio" name="r1"  />
                                <span class="check"></span>
                                R1
                            </label>
                        </div>
                        <div class="input-control radio default-style inline-block" data-role="input-control">
                            <label class="inline-block">
                                <input type="radio" name="r2" checked />
                                <span class="check"></span>
                                R1
                            </label>
                            <label class="inline-block">
                                <input type="radio" name="r2" />
                                <span class="check"></span>
                                R2
                            </label>
                        </div>
                        </div>
                        <div class="input-control switch" data-role="input-control">
                            <label class="inline-block" style="margin-right: 20px">
                                Switch me
                                <input type="checkbox" checked/>
                                <span class="check"></span>
                            </label>
                        </div>
                    </div>

                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">

                    <div style="margin-top: 20px">
                    </div>

                </fieldset>
            </form>
        </div>


<a href="add_course.php"> Can't find a course? </a>

</body></center>
</html> 
