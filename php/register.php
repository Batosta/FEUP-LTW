<?php

include_once("./encryption.php");
include_once("./register_functions.php");

$dbh = new PDO('sqlite:database.db');

$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$repassword = htmlspecialchars($_POST['repassword']);
$age = $_POST['age'];


$samePass = checkSamePasswords($password, $repassword);
if($samePass == 0)

	header("Location: ./signup.php?id=1");
else{

	$availableUsername = checkAvailableUsername($dbh, $username);
	if($availableUsername != null)

		header("Location: ./signup.php?id=2");
	else{

		$availableEmail = checkAvailableEmail($dbh, $email);
		if($availableEmail != null)
			header("Location: ./signup.php?id=3");
		else{
			$hashPass = encryptPass($password);
			$stmt = $dbh->prepare('INSERT INTO Account (accountID, personName, passW, email, username, age, city, job, photo) VALUES (NULL, ?, ?, ?, ?, ?, NULL, NULL, \'default.jpg\');');
			$stmt->execute(array($name, $hashPass, $email, $username, $age));
			header("Location: ./signin.php?id=0");
		}
	}

}

?>