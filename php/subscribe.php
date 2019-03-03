<?php

	$dbh = new PDO('sqlite:database.db');

    $accountID = $_POST['accountID'];
    $channelID = $_POST['channelID'];
    $subscription = $_POST['subscription'];

    if($subscription == 0){ // subscribe

    	$stmt = $dbh->prepare('INSERT INTO ChannelUsers(accountID, channelID) VALUES (?, ?);');
		$stmt->execute(array($accountID, $channelID));
    }
    else { // remove subscription

    	$stmt = $dbh->prepare('DELETE FROM ChannelUsers WHERE accountID = ? AND channelID = ?;');
		$stmt->execute(array($accountID, $channelID));
    }

    $location = 'Location: ./channel.php?id=' . $channelID;
    header($location);
?>