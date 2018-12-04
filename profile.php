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
    <link href="favicon.ico" rel="shortcut icon">
    <link href="profile_style.css" rel="stylesheet">
    <link href="profile_layout.css" rel="stylesheet">
    <link href="post_style.css" rel="stylesheet">
    <link href="post_layout.css" rel="stylesheet">    
  </head>
  <body>
    <div class="header">
      <h1><a href="wall.php">ONLINE 420</a></h1>
      <form id="search_users" action="search_users.php" method="post">
        <input type="text" name="userName" placeholder="Search users">
        <input type="submit" value="Search" >
      </form>
      <form id="logout" action="logout.php">
        <input type="submit" value="Log out" >
      </form>
      <h3><a href="change_profile.php">Alterar o perfil</a></h3>
    </div>

    <div class="main">
      <section id="bio">
        <img src=<?=$accountPhoto ?> alt="Profile photo" height="250" width="250">
        <h2><?=$accountUsername ?></h2>
        <h4><?=$accountName ?></h4>
        <h5><?=$accountEmail ?></h5>
        <h5><?=$accountBirthday ?></h5>
        <h5><?=$accountCity ?></h5>
        <h5><?=$accountJob ?></h5>
      </section>
      <section id="posts">
        <?
          showPostByAccountId($dbh, $account_id);
        ?>      
      </section>
    </div>
  </body>
</html>
