<?php
require "variables/variables.inc.php";

function encrypt($pass){

$pass_hash1 = md5($pass . $salt1);
echo $pass_hash1;
$passFinal = sha1($salt2 . $pass_hash1);
echo $passFinal;

return $passFinal;

}

?>