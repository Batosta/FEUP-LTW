<?php

$dbh = new PDO('sqlite:database.db');

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
    echo $row['username'], "|";
    echo $row['photo'], "<br>";
}

echo "<br><br>";
$stmt = $dbh->prepare('SELECT * FROM Post');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['postID'], "|";
    echo $row['accountID'], "|";
    echo $row['photo'], "|";
    echo $row['description'], "<br>";
}

echo "<br><br>";
$stmt = $dbh->prepare('SELECT * FROM Comment');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['commentID'], "|";
    echo $row['postID'], "|";
    echo $row['accountID'], "|";
    echo $row['commentText'], "<br>";
}

echo "<br><br>";
$stmt = $dbh->prepare('SELECT * FROM SubComment');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['subcommentID'], "|";
    echo $row['commentID'], "|";
    echo $row['accountID'], "|";
    echo $row['sucommentText'], "<br>";
}

?>