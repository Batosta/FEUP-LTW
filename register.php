<?php
$dbh = new PDO('sqlite:database.db');

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$birtdate = $_POST['birtdate'];

if($password != $repassword)
	echo "Passwords must be the same";

echo "Registered with success. Not yet added in the database, passwords must be encrypted first";
?>