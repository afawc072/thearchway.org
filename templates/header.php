<?php
if(isset($_SESSION['username'])){
echo"<div class='example'><nav class='horizontal-menu'><ul><li><a href='oforceportal.php'>home</a></li><li><a href='profile.html'>profile</a></li><li><a href='upload/upload.php'>upload</a></li><li><a href='about.php'>help</a></li><div class='element place-right'><button class='large' style= 'background-color: #00A255;'>Sign up</button><span class='element-divider place-right'></span><button class='large'>Log in</button></div></ul></nav></div>";
}
else{
echo"<div class='example'><nav class='horizontal-menu'><ul><li><a href='oforceportal.php'>home</a></li><li><a href='upload/upload.php'>upload</a></li><li><a href='about.php'>help</a></li><div class='element place-right'><button class='large' style= 'background-color: #00A255;'>Sign up</button><span class='element-divider place-right'></span><button class='large'>Log in</button></div></ul></nav></div>";
}
?>
