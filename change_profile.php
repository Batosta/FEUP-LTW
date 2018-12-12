<!DOCTYPE html>
<html lang="en-US"> 
  <?
    include ('./session.php');
  ?>
  <head>
    <title>Edit Profile</title> 
    <link href="favicon.ico" rel="shortcut icon">
    <link href="profile.css" rel="stylesheet">
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
      <form id="change" action="change_profile_functions.php" method="post">
        <input type="text" name="new_info" placeholder="Change Name">
        <input type="submit" class="button" name="change_name" value="Change" >
      </form>
      <form id="change" action="change_profile_functions.php" method="post">
        <input type="text" name="new_info" placeholder="Change Username">
        <input type="submit" class="button" name="change_username" value="Change" >
      </form>
      <form id="change" action="change_profile_functions.php" method="post">
        <input type="text" name="new_info" placeholder="Change Email">
        <input type="submit" class="button" name="change_email" value="Change" >
      </form>
      <form id="change" action="change_profile_functions.php" method="post">
        <input type="text" name="new_info" placeholder="Change Birthday">
        <input type="submit" class="button" name="change_birthday" value="Change" >
      </form>
      <form id="change" action="change_profile_functions.php" method="post">
        <input type="text" name="new_info" placeholder="Change City">
        <input type="submit" class="button" name="change_city" value="Change" >
      </form>
      <form id="change" action="change_profile_functions.php" method="post">
        <input type="text" name="new_info" placeholder="Change Job">
        <input type="submit" class="button" name="change_job" value="Change" >
      </form>
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
