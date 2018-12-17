<?php

include_once("./encryption.php");

$dbh = new PDO('sqlite:database.db');

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$age = $_POST['age'];

$hashPass = encryptPass($password);

$stmt = $dbh->prepare('INSERT INTO Account (accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (NULL, ?, ?, ?, ?, ?, NULL, NULL, \'default.jpg\');');
$stmt->execute(array($name, $hashPass, $email, $username, $age));


header('Location: ./login.php');
?>