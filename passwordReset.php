<!-- This PHP file is called by reset-password.php and sends an e-mail to a user who
lost is password -->
<?php

//VARIABLES

$tbl_name="Reset";
//Import the necessary information to connect to the DB and use
//the mail functions of php
session_start();
require 'PHPMailerAutoload.php';
require "db_connect.php"; 

//confirmation code generated for confirmation e-mail
$confirm_code=md5(uniqid(rand()));

//Received Variables from reset-password.php
$email=$_POST['emailInput'];

//Since the coloum registered needs to be set to 'f' for logins to be accepted, there won't be any 

?>