<?php

	include_once("../user_functions.php");
	include_once("../session.php");

	$dbh = new PDO('sqlite:database.db');

	$username = $_POST['username'];
	$password = $_POST['password'];

    if(checkPassword($dbh, $username, $password))
        $_SESSION['username'];
    else
        $_SESSION['ERROR'] = 'Incorrect password or username';
?>