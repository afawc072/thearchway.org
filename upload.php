<!DOCTYPE html>
    <html style="">

    <head>

<?php session_start() ?>
    <link href="../css/metro-bootstrap.css" rel="stylesheet">
    <link href="../css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="../iconFont.css" rel="stylesheet">
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

<div class="container">

<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">

<?php include ("../templates/header.php"); ?>




<center><body>

<form action="upload/upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<label for="course" >Course:</label>
<?php

//open connection
$conn = mysql_connect("localhost","admin","vincentdb") or die(mysql_error());
//select database
mysql_select_db("archway1", $conn);
$query = "SELECT * FROM Course"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<select name= 'course'>";// start a table tag in the HTML
echo '<option value="">'.'--Select Course--'.'</option>';
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<option value='". $row['cname'] . "'>".$row['cname'] .'</option>';
}

echo '</select>';
//mysql_close(); //Make sure to close out the database connection

?>
<input type="submit" name="submit" value="Submit">
</form>

<a href="upload/add_course.php"> Can't find a course? </a>

<div class="footer">
&copy; 2014 The Archway
</div>
</body></center>
</html> 
