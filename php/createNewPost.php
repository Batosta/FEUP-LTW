<?php

	include ('session.php');
	$dbh = new PDO('sqlite:database.db');

    $accountID = $_SESSION['accountID'];

    $title = $_POST['title'];
    $photo = $_POST['photo'];
    $description = $_POST['description'];
    $channelID = $_POST['channel'];

    $epoch = time();

    $stmt = $dbh->prepare('INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);');
    $stmt->execute(array($accountID, $channelID, $title, $photo, $description, 0, $epoch));

	header('Location: ./profile.php?id=0');
?>