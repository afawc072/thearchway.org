<?php
if(isset($_SESSION['username'])){
echo"<body link=gray><font face=Rockwell color= gray ><center><h2><a href=/archway/index.php> Search | </a> <a href=/archway/profile.html>Profile | </a> <a href=/archway/about.php>Help | </a><a href=/archway/upload/upload.php>Upload | </a> <a href=/archway/logout.php>Logout</a></center></font></body>";
}
else{
echo"<body link=gray><font face=Rockwell color= gray ><center><h2><a href=/archway/index.php> Search | </a> <a href=/archway/profile.html>Profile | </a> <a href=/archway/about.php>Help </a><a href=/archway/upload/upload.php>| Upload</a></center></font></body>";
}
?>
