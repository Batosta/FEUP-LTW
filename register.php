<?php

$dbh = new PDO('sqlite:database.db');

$id = 39;
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$age = $_POST['age'];

$stmt = $dbh->prepare('INSERT INTO Person (personID, personName, personAge) VALUES (?, ?, ?);');
$stmt->execute(array($id, $name, $age));

$stmt = $dbh->prepare('INSERT INTO Account (accountID, personID, passW, email, username) VALUES (?, ?, ?, ?, ?);');
$stmt->execute(array($id, $id, $password, $email, $username));

echo "User registered with success";
?>