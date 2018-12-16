<?php

  $dbh = new PDO('sqlite:database.db');
 
  $postID = $_POST['postID'];
  $accountID = $_POST['accountID'];
  $points = $_POST['points'];

  function eraseLike($dbh, $accountID, $postID){
    $stmt = $dbh->prepare('DELETE FROM LikeUser WHERE LikeUser.accountID = ? AND LikeUser.postID = ?');
    $stmt->execute(array($accountID, $postID));
  }

  function addPoint($dbh, $accountID, $postID, $points) {
	$stmt = $dbh->prepare('UPDATE Post SET points = ? WHERE Post.postID = ?');
	$stmt->execute(array($points, $postID));
  }

  function getPoints($dbh, $postID){
  	$stmt = $dbh->prepare('SELECT points FROM Post WHERE Post.postID = ?');
  	$stmt->execute(array($postID));

  	return $stmt->fetch();
  }

    addPoint($dbh, $accountID, $postID, $points);
    eraseLike($dbh, $accountID, $postID);
    $pointsAux = getPoints($dbh, $postID);
    echo json_encode($pointsAux); 
?>