<!DOCTYPE html>
<html lang="en-US">
  <?php
    $dbh = new PDO('sqlite:database.db');
    include ('user_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];
    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);
  ?>
  <head>
    <title>Wall</title>
    <link href="imagens/icon.png" rel="shortcut icon">
    <link href="wall.css" rel="stylesheet">
    <link href="common.css" rel="stylesheet">
    <link href="post_style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>
    
    <div class="mainContent">
      <div class="mainMenu">
        <a href="#"> Latest Music </a>
        <a href="#"> Album Reviews </a>
        <a href="#"> Single Reviews </a>
        <a href="#"> Music Discussions </a>
    </div>

    <div class="main">
      <?
        showAllPosts($dbh, $account_id);
      ?>
    </div>
  </div>

  </body>

  <? draw_footer(); ?>
</html>
