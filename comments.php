<?php
	
	function addComment($dbh, $accountID, $postID, $commentText) {

		$stmt = $dbh->prepare('INSERT INTO Comment (commentID, postID, accountID, commentText) VALUES (NULL, ?, ?, ?)');
		$stmt->execute(array($postID, $accountID, $commentText));
	}

	function getCommentsAfterId($dbh, $postID){

		$stmt = $dbh->prepare('SELECT comment.commentID FROM comment WHERE comment.postID = ?');
		$stmt->execute(array($postID));

		$commentID = $stmt->fetch();

		$stmt = $dbh->prepare('SELECT comment.*, account.username FROM comment JOIN account USING (accountID) WHERE postID = ? AND comment.commentID = ?');
		$stmt->execute(array($postID,$commentID));
		return $stmt->fetchAll();
	}

?>