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
    <link href="/imagens/icon.png" rel="shortcut icon">
    <link href="profile.css" rel="stylesheet">
    <link href="post_style.css" rel="stylesheet">
    <link href="post_layout.css" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>
    <div class="navBar">

      <div class="menu">
          <img src="imagens/menu.png" height="25" width="25">
          <div class="menuContent">
            <a href="#"><p>Home Page</p></a>
            <a href="#"><p>Edit profile</p></a>
            <a href="#"><p>Subscription</p></a>
            <a href="#"><p>Liked</p></a>
          </div>
      </div>

      <div class="searchBar">
          <form>
              <input type="text" name="search" placeholder="Search something in your profile">
          </form>
      </div>
      
      <div class="logOut">
          <img src="imagens/logout.png" height="25" width="25">
          <div class="logOutContent">
            <a href="logout.php"><p>Sign Out</p></a>
            <a href="logotheraccount.php"><p>Sign into another account </p></a>
          </div>
      </div>
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

  <footer>
    <div class="about">
      <p>About Us  <p>
    </div>
    <div class="ltw">
      <p>Linguagens & Tecnoglogias Web<p>
    </div>
    <div class="contacts">
      <p> Contact </p>
    </div>
  </footer>


</html>
