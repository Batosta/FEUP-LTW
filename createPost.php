<!DOCTYPE html>
<html lang="en-US"> 
  <?
    $dbh = new PDO('sqlite:database.db');
    include ('user_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];
    $account_channels = getChannelIDs($dbh, $account_id);
  ?>

  <head>
    <title>Profile</title> 
    <link href="imagens/icon.png" rel="shortcut icon">
    <link href="profile.css" rel="stylesheet">
    <link href="post_style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300" rel="stylesheet">
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
      <section id="posts">
      	<form id="signup" action="createNewPost.php" method="post">
	        <p> Create new Post </p>
	        <p><input type="text" name="title" placeholder="Title" required="required"></p>
	        <p><input type="text" name="photo" placeholder="Photo"></p>
	        <p><input type="text" name="description" placeholder="Description" required="required"></p>
	        <?
	        	foreach($account_channels as $account_channel) {

	        		$channel_name = getChannelName($dbh, $account_channel['channelID']);
	        ?>
	        <input type="radio" name="channel" value="<?=$account_channel['channelID']?>" checked="checked"><?=$channel_name?>
	    	<? } ?>
	        <p><input id="button" type="submit" value="Create Post"></p>
	      </form>
      </section>
    </div>  

    <div class="otherPages">   <!--  Fazer share ao site maybe? how tho-->
      <a id="insta" href="https://www.instagram.com" target="_blank"> Instagram</a>
      <a id="face" href="https://www.facebook.com" target="_blank"> Facebook </a>
    </div>

  </body>

  <footer>
    <div class="about">
      <p>About Us  <p>
    </div>
    <div class="ltw">
      <a id="ltw" href="https://web.fe.up.pt/~arestivo/page/courses/2018/ltw/" target="_blank"><p>Linguagens & Tecnoglogias Web</p></a>
    </div>
    <div class="contacts">
      <p> Contact </p>
    </div>
  </footer>


</html>
