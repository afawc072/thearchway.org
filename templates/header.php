<?php

if(isset($_SESSION['username'])){
echo"<div class='example' style=' position:fixed; top:0px; margin:auto; z-index:990; width:100%;'><nav class='horizontal-menu'><ul><li><a href='index.php'>home</a></li><li><a href='upload.php'>upload</a></li><li><a href='about.php'>help</a></li><div class='element place-right'><li>Welcome, $_SESSION[username] </li><a href='logout.php'><button class='large'>Sign out</button></a></div></ul></nav></div>";
}
else{
echo"<div class='example' style=' position:fixed; top:0px; margin:auto; z-index:990; width:100%;'><nav class='horizontal-menu'><ul><li><a href='index.php'>home</a></li><li><a href='about.php'>help</a></li><div class='element place-right'><a href='sign-up.php' style='padding: 11px 19px; font-size: 17.5px; text-align: center; vertical-align: middle !important; background-color: #00A255; border: 1px transparent solid; color: #222222; border-radius: 0; cursor: pointer; display: inline-block; outline: none; font-family: Segoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif; line-height: 16px; margin: auto;'>Sign up</a><span class='element-divider place-right'></span><a href='#login-box' class='login-window' style='padding: 11px 19px; font-size: 17.5px; text-align: center; vertical-align: middle !important; background-color: #d9d9d9; border: 1px transparent solid; color: #222222; border-radius: 0; cursor: pointer; display: inline-block; outline: none; font-family: Segoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif; line-height: 16px; margin: auto;'>Login</a></div></ul></nav></div>";
}
?>



                  