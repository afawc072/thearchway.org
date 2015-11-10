<?php
require "db_connect.php";

session_start();
if(!isset($_SESSION['username'])){
header('Location:/sign-up.php');
}



ignore_user_abort(true);
set_time_limit(0); // disable the time limit for this script

//$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_GET['download_file']); // simple file name validation
$courseName = substr($dl_file, 0, 7);
$path = "/var/www/upload/uploadedFiles/".$courseName."/"; // change the path to fit your websites document structure
//$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
$fullPath = $path.$_GET['download_file'];
$user = $_SESSION['email'];

$sql = "INSERT INTO download (file, course, user) VALUES ('$_GET['download_file']', '$courseName', '$user')";
$result=mysql_query($sql) or die(mysql_error());

echo $dl_file;
echo "\n";
echo $path;
echo "\n";
echo $fullPath;
echo "\n";


$mm_type="application/octet-stream"; // modify accordingly to the file type of $path, but in most cases no need to do so

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Type: " . $mm_type);
header("Content-Length: " .(string)(filesize($fullPath)) );
header('Content-Disposition: attachment; filename="'.basename($fullPath).'"');
header("Content-Transfer-Encoding: binary\n");

ob_clean();
flush();
readfile($fullPath); // outputs the content of the file

exit();


// if ($fd = fopen ($fullPath, "r")) {
//     $fsize = filesize($fullPath);
//     $path_parts = pathinfo($fullPath);
//     $ext = strtolower($path_parts["extension"]);
//     switch ($ext) {
//         case "pdf":
//         echo "pdf";
//         echo "\n";
//         header("Content-type: application/pdf");
//         header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
//         header("Content-length: $fsize");
//     header("Cache-control: private"); //use this to open files directly
//     //while(!feof($fd)) {
//     //    $buffer = fread($fd, 2048);
//     //    echo $buffer;
//     // }
//     ob_clean();
//     readfile($fd);
//     fclose ($fd);
//         break;
//         // add more headers for other content types here
//         //default;
//         //header("Content-type: application/octet-stream");
//         //header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
//         //break;
//     }
    
// }
// //fclose ($fd);
// exit;