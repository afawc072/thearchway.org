<?php

ignore_user_abort(true);
set_time_limit(0); // disable the time limit for this script

$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_GET['download_file']); // simple file name validation
$courseName = substr($dl_file, 0, 7);
$path = "/var/www/archway/upload/uploadedFiles/".$courseName."/"; // change the path to fit your websites document structure
$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
$fullPath = $path.$dl_file;

echo $dl_file;
echo "\n";
echo $path;
echo "\n";
echo $fullPath;
echo "\n";

if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    switch ($ext) {
        case "pdf":
        echo "pdf";
        echo "\n";
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
        // add more headers for other content types here
        default;
        header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
        break;
    }
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
     }
    //readfile($fd);
}
fclose ($fd);
exit;