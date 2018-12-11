<!DOCTYPE html>
<html lang="en-US"> 
  <?
    $dbh = new PDO('sqlite:database.db');
    include ('user_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];

    $channel_ids = getChannelIDs($dbh, $account_id);
  ?>

  <head>
    <title>Profile</title> 
    <link href="imagens/icon.png" rel="shortcut icon">
    <link href="profile.css" rel="stylesheet">
    <link href="post_style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>
    <div class="navBar">

      <div class="menu">
          <img src="imagens/menu.png" height="25" width="25">
          <div class="menuContent">
            <a id="homePage" href="profile.php"><p>Profile</p></a>
            <a id="settings" href="change_profile.php"><p>Edit profile</p></a>
            <a id="subs" href="subscriptions.php"><p>Subscriptions</p></a>
            <a id="likes" href="#"><p>Liked</p></a>
          </div>
      </div>

      <div class="searchBar">
          <form>
              <input type="text" name="search" placeholder="Search something in your profile">
          </form>
      </div>
      
      <div class="logOut">
          <img src="imagens/turn-on.png" height="25" width="25">
          <div class="logOutContent">
            <a id="logOut" href="logout.php"><p>Sign Out</p></a>
            <a id="user" href="logotheraccount.php"><p>Sign into other account </p></a>
          </div>
      </div>
    </div>

    <div class="main">
      <section id="bio">
        <h1> Following Channels </h1>
        <? 
          foreach($channel_ids as $channel_id){

            $channel_name = getChannelName($dbh, $channel_id[0]);
        ?>
        <a href="channel.php?id=<?=$channel_id[0]?>"><p><?=$channel_name?></p></a>
        <? } ?>
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
