<?php

$dbh = new PDO('sqlite:database.db');

$id = 15;
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$age = $_POST['age'];

echo "$id, $name, $age, $password, $email, $username";

$stmt = $dbh->prepare('INSERT INTO Person (personID, personName, personAge) VALUES (?, ?, ?);');
$stmt->execute(array($id, $name, $age));

$stmt = $dbh->prepare('INSERT INTO Account (accountID, personID, passW, email, username) VALUES (?, ?, ?, ?, ?);');
$stmt->execute(array($id, $id, $password, $email, $username));

echo "<br><br>";
$stmt = $dbh->prepare('SELECT * FROM Person');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['personID'], "|";
    echo $row['personName'], "|";
    echo $row['personAge'], "<br>";
}


echo "<br><br>";
$stmt = $dbh->prepare('SELECT * FROM Account');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['accountID'], "|";
    echo $row['personID'], "|";
    echo $row['passW'], "|";
    echo $row['email'], "|";
    echo $row['username'], "<br>";
}

?>