<?php

$dbh = new PDO('sqlite:database.db');

$stmt = $dbh->prepare('SELECT * FROM Post');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['postID'], "|";
    echo $row['accountID'], "|";
    echo $row['photo'], "|";
    echo $row['description'], "<br>";
}

?>