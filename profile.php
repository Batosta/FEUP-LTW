<!DOCTYPE html>
<html lang="en-US"> 
  <?
    $dbh = new PDO('sqlite:database.db');
    include ('user_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];

    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountName = getAccountName($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);
    $accountEmail = getAccountEmail($dbh, $account_id);
    $accountBirthday = getAccountBirthday($dbh, $account_id);
    $accountCity = getAccountCity($dbh, $account_id);
    $accountJob = getAccountJob($dbh, $account_id);
  ?>

  <head>
    <title>Profile</title> 
    <link href="imagens/icon.png" rel="shortcut icon">
    <link href="profile.css" rel="stylesheet">
    <link href="post_style.css" rel="stylesheet">
    <link href="common.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300, 300i|Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300" rel="stylesheet">
  </head>

  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>

    <div class="main">
      <section id="bio">
        <img src=<?=$accountPhoto ?> alt="Profile photo" height="150" width="150">
        <h2><?=$accountUsername ?></h2>
        <h4><?=$accountName ?></h4>
        <h5><?=$accountEmail ?></h5>
        <h5><?=$accountBirthday ?></h5>
        <h5><?=$accountCity ?></h5>
        <h5><?=$accountJob ?></h5>
      </section>
      <section id="posts">
        <a id="create__post" href="createPost.php"><p>Create Post</p></a>
        <?
          showPostByAccountId($dbh, $account_id);
        ?>
      <script src="script.js" defer></script>
      <script src="script1.js" defer></script>            
      </section>
    </div>  

    <div class="otherPages">   <!--  Fazer share ao site maybe? how tho-->
      <a id="insta" href="https://www.instagram.com" target="_blank"> Instagram</a>
      <a id="face" href="https://www.facebook.com" target="_blank"> Facebook </a>
    </div>

  </body>
  <? draw_footer() ?>
</html>
