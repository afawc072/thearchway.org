<?php

if(isset($_SESSION['username'])){
echo"<center><footer><ul class='horizontal-menu compact'><li><p style='color: #666; font-size: small;'>&copy; 2015 Archway</p></li><li><a href='index.php' style='color: #666; font-size: small;'>Home</a></li><li><a href='upload.php' style='color: #666; font-size: small;'>Upload</a></li><li><a href='about.php' style='color: #666; font-size: small;'>Help</a></li><li><a href='about.php' style='color: #666; font-size: small;'>Privacy</a></li><li><a href='contact.php' style='color: #666; font-size: small;'>Feedback</a></li></ul></footer></center>";
}
else{
echo"<center><footer><ul class='horizontal-menu compact'><li><p style='color: #666; font-size: small;'>&copy; 2015 Archway</p></li><li><a href='index.php' style='color: #666; font-size: small;'>Home</a></li><li><a href='about.php' style='color: #666; font-size: small;'>Help</a></li><li><a href='about.php' style='color: #666; font-size: small;'>Privacy</a></li><li><a href='contact.php' style='color: #666; font-size: small;'>Feedback</a></li></ul></footer></center>";
}
?>