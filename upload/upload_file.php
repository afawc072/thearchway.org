<?php

session_start();
if(!isset($_SESSION['username'])){
header('Location:/archway/profile.html');


$allowedExts = array("ppt","docx","doc","pdf","odt");
$temp = explode(".",$_FILES["file"]["name"]);
$cname = $_POST["course"];
$description = $_POST["details"];
$filename = $cname."_".$_FILES["file"]["name"];
$extension = end($temp);
$structure = "/var/www/archway/upload/uploadedFiles/";
$user=$_SESSION['username'];
if ((($_FILES["file"]["type"] == "application/vnd.ms-powerpoint")
|| ($_FILES["file"]["type"] == "application/vnd.oasis.opendocument.text")
|| ($_FILES["file"]["type"] == "application/msword")
|| ($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["file"]["type"] == "text/pdf"))
&& ($_FILES["file"]["size"] < 20000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo $cname ;

    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    //if (file_exists($structure.$cname."_".$_FILES["file"]["name"]))
      if (file_exists($structure.$cname."/".$filename))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
   echo $cname;
      // if(!file_exists(dirname("/opt/lampp/htdocs/php_website_test/uploadedFiles/" .$tname)))
    if (!is_dir($structure.$cname)) {
        mkdir($structure.$cname);         
echo 'Directory not found';
       }
     
      $path=$structure.$cname."/".$filename
      move_uploaded_file($_FILES["file"]["tmp_name"], $path);

      $descfile = fopen($structure.$cname."/".$filename.".description","w");
      fwrite($descfile,$description);
      echo $description;
      fclose($descfile);

      //Add course to MYSQL DB

      //open connection
      $conn = mysql_connect("localhost", "admin", "vincentdb") or die(mysql_error());
      //select database
      mysql_select_db("archway1", $conn);

      $sql2 = "INSERT INTO Files (courseFile,description,path,user) VALUES ('$filename','$description','$path','$user')";
      $result=mysql_query($sql2, $conn) or die(mysql_error());
      mysql_close($conn);


      echo "Stored in: " . "uploadedFiles/" . $cname."/".$filename;
      }
    }
  }
else
  {
  echo "Invalid file. You can only upload documents with the 'pdf', 'doc', 'docx', 'ppt' and 'odt' extension and smaller than 20 Mb";
  }
?> 
