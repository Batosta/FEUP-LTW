<?php

include_once("./encryption.php");
include_once("./register_functions.php");

$dbh = new PDO('sqlite:database.db');

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
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
			header("Location: ../login.html");
		}
	}

}

?>