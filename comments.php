<?php
	
	function addComment($dbh, $accountID, $postID, $commentText) {

		$stmt = $dbh->prepare('INSERT INTO Comment (commentID, postID, accountID, commentText) VALUES (NULL, ?, ?, ?)');
		$stmt->execute(array($postID, $accountID, $commentText));

		header('Location: ./profile.php');
	}

	function getCommentsAfterId($postID, $commentID){
		$stmt = $db->prepare('SELECT comment.*, account.accountID FROM comment JOIN account USING (accountID) WHERE postID = ? AND comment.commentID > ?');
		$stmt->execute(array($postID, $commentID));
		return $stmt->fetchAll();
	}
?>