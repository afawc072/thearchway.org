<?php

session_start();
if(!isset($_SESSION['username'])){
header('Location:/archway/profile.html');
}

$allowedExts = array("ppt","docx","doc","pdf","odt");
$temp = explode(".",$_FILES["file"]["name"]);
$cname = $_POST["coursesInput"];
$description = $_POST["details"];
$filename = $cname."_".$_FILES["file"]["name"];
$filename = trim($filename, " \t\n\r\0\x0B" );
$filename = str_replace(' ', '', $filename);
$filename = preg_replace('/\s+/', '', $filename);
$extension = end($temp);
$structure = "/var/www/archway/upload/uploadedFiles/";
$user = $_SESSION['username'];
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

        echo "A File With That Name Already Exists";
      
        header("refresh:5; url=/archway/upload.php");
      }
    else
      {
   echo $cname;
      // if(!file_exists(dirname("/opt/lampp/htdocs/php_website_test/uploadedFiles/" .$tname)))
    if (!is_dir($structure.$cname)) {
        mkdir($structure.$cname);
//        echo 'Directory not found';
       }

      $path=$structure.$cname."/".$filename;
      move_uploaded_file($_FILES["file"]["tmp_name"], $structure.$cname."/".$filename);

      //Add course to MYSQL DB

      //open connection
      $conn = mysql_connect("localhost", "admin", "vincentdb") or die(mysql_error());
      //select database
      mysql_select_db("archway1", $conn);

      if(!empty($_POST['details'])){
        $sql2 = "INSERT INTO Files (fromCourse, description, courseFile,path,user) VALUES ('$cname','$description','$filename','$path','$user')";
      } else {
          $sql2 = "INSERT INTO Files (fromCourse, courseFile,path,user) VALUES ('$cname','$filename','$path','$user')";  
      }
      $result=mysql_query($sql2, $conn) or die(mysql_error());
      mysql_close($conn);
    
      echo "Thank you for Contributing to the Archway";
    
      header("refresh:5; url=/archway");
      }
    }
  }
else
  {


      echo "Invalid file. You can only upload documents with the 'pdf', 'doc', 'docx', 'ppt' and 'odt' extension and smaller than 20 Mb";      
      header("refresh:5; url=/archway/upload.php");
 
  }
?>