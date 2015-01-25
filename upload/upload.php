
<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location:/archway/profile.html');
}
?>
 <html>

<?php include ("/opt/lampp/htdocs/archway/templates/header.php"); ?>

<center><body>

<form action="upload_file.php" method="post"
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
echo "<option value='". $row['cid'] . "'>".$row['cid'] .'</option>';
}

echo '</select>';
//mysql_close(); //Make sure to close out the database connection

?>
<input type="submit" name="submit" value="Submit">
</form>

<div class="footer">
&copy; 2014 The Archway
</div>
</body></center>
</html> 
