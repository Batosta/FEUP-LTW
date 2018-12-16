<?php

$dbh = new PDO('sqlite:database.db');


echo 'Account<br>';
$stmt = $dbh->prepare('SELECT * FROM Account');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['accountID'], "|";
    echo $row['personName'], "|";
    echo $row['passW'], "|";
    echo $row['email'], "|";
    echo $row['username'], "|";
    echo $row['birthday'], "|";
    echo $row['city'], "|";
    echo $row['job'], "|";
    echo $row['photo'], "<br>";
}

echo "<br><br>Channel<br>";
$stmt = $dbh->prepare('SELECT * FROM Channel');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['channelID'], "|";
    echo $row['description'], "<br>";
}

echo "<br><br>ChannelUsers<br>";
$stmt = $dbh->prepare('SELECT * FROM ChannelUsers');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['accountID'], "|";
    echo $row['channelID'], "<br>";
}

echo "<br><br>Post<br>";
$stmt = $dbh->prepare('SELECT * FROM Post');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['postID'], "|";
    echo $row['accountID'], "|";
    echo $row['channelID'], "|";
    echo $row['title'], "|";
    echo $row['photo'], "|";
    echo $row['description'], "|";
    echo $row['points'], "<br>";
}

echo "<br><br>LikeUser<br>";
$stmt = $dbh->prepare('SELECT * FROM LikeUser');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['accountID'], "|";
    echo $row['postID'], "<br>";
}

echo "<br><br>Comment<br>";
$stmt = $dbh->prepare('SELECT * FROM Comment');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['commentID'], "|";
    echo $row['postID'], "|";
    echo $row['accountID'], "|";
    echo $row['commentText'], "<br>";
}

echo "<br><br>SubComment<br>";
$stmt = $dbh->prepare('SELECT * FROM SubComment');
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo $row['subcommentID'], "|";
    echo $row['commentID'], "|";
    echo $row['accountID'], "|";
    echo $row['subcommentText'], "<br>";
}

?>