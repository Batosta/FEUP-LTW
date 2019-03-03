<?php

    include ('session.php');

	$dbh = new PDO('sqlite:database.db');

    $accountID = $_SESSION['accountID'];

    $description = htmlspecialchars($_POST['description']);


    $stmt = $dbh->prepare('INSERT INTO Channel (channelID, description) VALUES (NULL, ?);');
    $stmt->execute(array($description));
    $last_id = $dbh->lastInsertId();

    $stmt = $dbh->prepare('INSERT INTO ChannelUsers (accountID, channelID) VALUES (?, ?);');
    $stmt->execute(array($accountID, $last_id));

	header('Location: ./wall.php');
?>