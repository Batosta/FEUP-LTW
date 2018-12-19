<?php

  include_once('comments.php');
  $dbh = new PDO('sqlite:database.db');
 
  $postID = $_POST['postID'];
  $accountID = $_POST['accountID'];
  $commentText = htmlspecialchars($_POST['commentText']);

  addComment($dbh, $accountID, $postID, $commentText);

  $comments = getCommentsAfterId($dbh, $postID);

  echo json_encode($comments);
?>