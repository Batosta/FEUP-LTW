<?php
	function addComment($commentID, $postID, $accountID, $text) {
		$stmt = $db->prepare('INSERT INTO comment (commentID, postID, accountID, commentText) VALUES (NULL, ?, ?, ?)');
		$stmt->execute(array($postID, $accountID, $text));
	}

	function getCommentsAfterId($postID, $commentID){
		$stmt = $db->prepare('SELECT comment.*, account.accountID FROM comment JOIN account USING (accountID) WHERE postID = ? AND comment.commentID > ?');
		$stmt->execute(array($postID, $commentID));
		return $stmt->fetchAll();
	}
?>