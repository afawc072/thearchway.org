<?php
$allowedExts = array("ppt","docx","doc","pdf","odt");
$temp = explode(".",$_FILES["file"]["name"]);
$cname = $_POST["course"];
$filename = $cname."_".$_FILES["file"]["name"];
$extension = end($temp);
$structure = "/var/www/archway/upload/uploadedFiles/";
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
echo 'DIrectory not found';
       }
     
      //move_uploaded_file($_FILES["file"]["tmp_name"], $structure.$cname."_".$_FILES["file"]["name"]);
      move_uploaded_file($_FILES["file"]["tmp_name"], $structure.$cname."/".$filename);
      echo "Stored in: " . "uploadedFiles/" . $cname."/".$filename;
      }
    }
  }
else
  {
  echo "Invalid file. You can only use documents of 'pdf', 'doc', 'docx' and 'odt' smaller than 20 Mb";
  }
?> 
