<?php
  $db = new PDO('sqlite:news.db');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  include_once('comments.php');

  $commentID = $_POST['commentID'];
  $postID = $_POST['postID'];
  $accountID = $_POST['accountID'];
  $commentText = $_POST['commentText'];

  addComment($commentID, $postID, $accountID, $text);

  $comments = getCommentsAfterId($postID, $commentID);
  echo json_encode($comments);

?>