<?php
	
	include_once("post_functions.php");

	$dbh = new PDO('sqlite:database.db');

	$accountID = $_POST['accountID'];
	$postID = $_POST['postID'];
	$page_name = $_POST['page_name'];

	$points = getPostPoints($dbh, $postID);


	$stmt = $dbh->prepare('SELECT value FROM Vote WHERE accountID = ? AND postID = ?;');
	$stmt->execute(array($accountID, $postID));
	$row = $stmt->fetch();

	if($row == null){

		$stmt = $dbh->prepare('INSERT INTO Vote(accountID, postID, value) VALUES (?, ?, ?);');
		$stmt->execute(array($accountID, $postID, 0));

		$pointsAux = $points - 1;
		$stmt = $dbh->prepare('UPDATE Post SET points = ? WHERE postID = ?');
		$stmt->execute(array($pointsAux, $postID));
	}
	else if($row['value'] == 1){

		$stmt = $dbh->prepare('UPDATE Vote SET value = ? WHERE accountID = ? AND postID = ?');
   		$stmt->execute(array(1, $accountID, $postID));

   		$pointsAux = $points - 2;
		$stmt = $dbh->prepare('UPDATE Post SET points = ? WHERE postID = ?');
		$stmt->execute(array($pointsAux, $postID));
	}
	else if($row['value'] == 0){

		$stmt = $dbh->prepare('DELETE FROM Vote WHERE accountID = ? AND postID = ?;');
   		$stmt->execute(array($accountID, $postID));

   		$pointsAux = $points + 1;
		$stmt = $dbh->prepare('UPDATE Post SET points = ? WHERE postID = ?');
		$stmt->execute(array($pointsAux, $postID));
	}

	$location = 'Location: ' . $page_name;
    header($location);
?>