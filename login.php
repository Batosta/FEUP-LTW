<?php

	include_once("../user_functions.php");
	include_once("../session.php");

	$dbh = new PDO('sqlite:database.db');
	$dbh->setAttribute(PDO::ATR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$username = $_POST['username'];
	$password = $_POST['password'];

    if(checkPassword($dbh, $username, $password)){
       // $_SESSION['username'] = $username;
    	setCurrentUser($_POST['username']);
        $_SESSION['success_messages'][] = "User logged in!";
        //header('Location: ../register.html');
    }
    else{
        $_SESSION['ERROR'] = 'Incorrect password or username';
        header('Location: ../login.php');
    }

    //Redirect para a page anterior
    //header("Location: $_SERVER['HTTP_REFERER']");
?>