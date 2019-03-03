<?php

$dbh = new PDO('sqlite:database.db');

$commentID = $_POST['commentID'];

$stmt = $dbh->prepare('DELETE FROM Comment WHERE commentID = ?;');
$stmt->execute(array($commentID));

header('Location: ./profile.php?id=0');
?>