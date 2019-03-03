<?php

	include_once("utilities_functions.php");
    include_once("account_functions.php");
	include_once("session.php");

	$dbh = new PDO('sqlite:database.db');

	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);


    if(checkPassword($dbh, $username, $password)){
        $_SESSION['status']="Active";
        $accountID = getUserID($dbh, $username);
        currentUser($username, $accountID);
        header('Location: ./profile.php?id=0');
    }
    else{
        $_SESSION['ERROR'] = 'Incorrect password or username';
        header('Location: ./signin.php?id=1');
    }
?>