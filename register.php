<?php

$dbh = new PDO('sqlite:database.db');

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$age = $_POST['age'];

echo $name, "<br><br>";
echo $email, "<br><br>";
echo $username, "<br><br>";
echo $password, "<br><br>";
echo $repassword, "<br><br>";
echo $age, "<br><br>";

$stmt = $dbh->prepare('INSERT INTO Account (accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (NULL, ?, ?, ?, ?, ?, NULL, NULL, \'default.png\');');
$stmt->execute(array($name, $password, $email, $username, $age));

echo "User registered with success";
?>