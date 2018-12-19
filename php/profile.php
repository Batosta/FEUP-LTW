<!DOCTYPE html>
<html lang="en-US"> 
  <?
    $dbh = new PDO('sqlite:database.db');
    include ('account_functions.php');
    include ('channel_functions.php');
    include ('utilities_functions.php');
    include ('post_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];

    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountName = getAccountName($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);
    $accountEmail = getAccountEmail($dbh, $account_id);
    $accountAge = getAccountAge($dbh, $account_id);
    $accountCity = getAccountCity($dbh, $account_id);
    $accountJob = getAccountJob($dbh, $account_id);
    $accountPoints = getAccountPoints($dbh, $account_id);

    $sortID = $_GET['id'];
  ?>

  <head>
    <title>Profile</title> 
    <link href="../imagens/icon.png" rel="shortcut icon">
    <link href="../css/profile.css" rel="stylesheet">
    <link href="../css/post_style.css" rel="stylesheet">
    <link href="../css/common.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300, 300i|Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300" rel="stylesheet">
  </head>

  <body>
    <? draw_header($accountPhoto, $accountUsername); ?>
    <div class="main">
      <section id="bio">
        <img src='../imagens/<?=$accountPhoto?>' alt="Profile photo" height="150" width="150">
        <h2><?=$accountUsername ?></h2>
        <h4><?=$accountName ?></h4>
        <h4><points><?=$accountPoints ?></points></h4>
        <h5><?=$accountEmail ?></h5>
        <h5><age><?=$accountAge ?></age></h5>
        <h5><?=$accountCity ?></h5>
        <h5><?=$accountJob ?></h5>
      </section>
      <section id="posts">
        <section id="sorts">
          <a href="profile.php?id=0">Fresh</a>
          <a href="profile.php?id=1">Old</a>
          <a href="profile.php?id=2">Most liked</a>
          <a href="profile.php?id=3">Most disliked</a>
        </section>
        <? 
          showPostByAccountId($dbh, $account_id, $sortID);
        ?>
      </section>
      <? draw_other_pages(); ?>
    </div>
  </body>
  <? draw_footer() ?>

</html>
