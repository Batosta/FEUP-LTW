<?php

	include ('session.php');
	$dbh = new PDO('sqlite:database.db');

    $accountID = $_SESSION['accountID'];

    $title = $_POST['title'];
    $photo = $_POST['photo'];
    $description = $_POST['description'];
    $channelID = $_POST['channel'];

    $newDate = new DateTime();
    $dateHour = $newDate->format("jS F h:i");


    echo $accountID, '<br>';
    echo $channelID, '<br>';
    echo $title, '<br>';
    echo $photo, '<br>';
    echo $description, '<br>';
    echo $dateHour, '<br>';

    $stmt = $dbh->prepare('INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, dateHour) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);');
    $stmt->execute(array($accountID, $channelID, $title, $photo, $description, 0, $dateHour));

	header('Location: ./profile.php');
?>