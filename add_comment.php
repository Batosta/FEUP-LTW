<?php


  include_once('./session.php');
  include_once('comments.php');

  $dbh = new PDO('sqlite:database.db');
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $accountID = $_SESSION['accountID'];

  $postID = $_POST['postID'];
  $commentText = $_POST['newcomment'];

  addComment($dbh, $accountID, $postID, $commentText);

  // $comments = getCommentsAfterId($postID, $commentID);
  // echo json_encode($comments);

?>