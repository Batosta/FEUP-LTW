<?php
	
	function addComment($dbh, $accountID, $postID, $commentText) {

		$stmt = $dbh->prepare('INSERT INTO Comment (commentID, postID, accountID, commentText) VALUES (NULL, ?, ?, ?)');
		$stmt->execute(array($postID, $accountID, $commentText));
	}

	function getCommentsAfterId($dbh, $postID){

		$x .= "\n";
		$stmt = $dbh->prepare('SELECT max(comment.commentID) FROM comment WHERE comment.postID = ?');
		$stmt->execute(array($postID));

		$commentID = $stmt->fetch();
		$commentID = array_values($commentID)[0];

		$x .= "\n";
		$stmt = $dbh->prepare('SELECT * FROM comment WHERE postID = ? AND comment.commentID = ?');

		$stmt->execute([$postID,$commentID]);

		return $stmt->fetchAll();
	}

?>