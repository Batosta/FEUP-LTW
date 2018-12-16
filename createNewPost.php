<?php

	include ('session.php');
	$dbh = new PDO('sqlite:database.db');

    $accountID = $_SESSION['accountID'];

    $newPost_title = $_POST['title'];
    $newPost_photo = $_POST['photo'];
    $newPost_description = $_POST['description'];
    $newPost_channelID = $_POST['channel'];

    $stmt = $dbh->prepare('INSERT INTO Post (postID, accountID, channelID, title, photo, description, points) VALUES (NULL, ?, ?, ?, ?, ?, ?);');
    $stmt->execute(array($accountID, $newPost_channelID, $newPost_title, $newPost_photo, $newPost_description, 0));

	header('Location: ./profile.php');
?>