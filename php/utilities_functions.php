<?php

	include_once("./encryption.php");

	function checkPassword($dbh, $username, $password){

        $pass = encryptPass($password);

        $stmt = $dbh->prepare('SELECT * FROM Account WHERE username = ? AND passW = ?');
        $stmt->execute(array($username, $pass));

        return $stmt->fetch() ? true : false; //returns true if exists
    }


	function draw_header($accountPhoto, $accountUsername) { ?>
       
        <div class="navBar">

            <div class="menu">
                <img src="../imagens/menu.png" height="25" width="25">
                <div class="menuContent">
                    <a id="homePage" href="wall.php"><p>Home Page</p></a>
                    <a id="settings" href="change_profile.php"><p>Edit profile</p></a>
                    <a id="subs" href="subscriptions.php"><p>Subscriptions</p></a>
                    <a id="discover" href="discover.php"><p>Discover</p></a>
                </div>
            </div>

            <div class="user">
                <a href="profile.php"><img src="../imagens/<?=$accountPhoto?>" height = "25" width="25"></a>
                <a id="tinyName" href="profile.php"><?=$accountUsername?></a>
            </div>

            <div class="searchBar">
                <form action="search.php" method="post">
                    <input type="text" name="search" placeholder="Search something in your profile">
                </form>
            </div>
              
            <div class="logOut">
                <img src="../imagens/turn-on.png" height="25" width="25">
                <div class="logOutContent">
                    <a id="logOut" href="logout.php"><p>Sign Out</p></a>
                    <a id="user" href="logotheraccount.php"><p>Sign into other account </p></a>
                </div>
            </div>
        </div>
    <? }

    function draw_footer() { ?>

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
    <? }

    function draw_other_pages(){ ?>

    	<div class="otherPages">
	      <a id="insta" href="https://www.instagram.com" target="_blank"> Instagram</a>
	      <a id="face" href="https://www.facebook.com" target="_blank"> Facebook </a>
	      <a id="spotify" href="https://open.spotify.com/browse/featured" target="_blank"> Spotify</a>
	    </div>
    <? }



    function updateUserPhoto($dbh, $accountID, $photo) {
    
        try {
          $stmt = $dbh->prepare('UPDATE Account SET photo = ? WHERE accountID = ?');
          if($stmt->execute(array($photo, $accountID)))
              return true;
          else
              return false;
        }catch(PDOException $e) {
          return false;
        }
    } 

?>