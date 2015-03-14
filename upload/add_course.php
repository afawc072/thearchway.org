<html>

<?php
session_start();
if(!isset($_SESSION['username'])){
header('Location:/archway/profile.html');
}
?>

<body><center>

<!--Add a Course to the DB-->
<form action="add_course_function.php" method="post">
Course to add:
<input type="text" name="coursetoadd">
<input type="submit" value="Add Course">
</form>

</center></body>

</html>
