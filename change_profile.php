<!DOCTYPE html>
<html lang="en-US"> 
  <?
    include ('./session.php');
  ?>
  <head>
    <title>Profile</title> 
    <link href="favicon.ico" rel="shortcut icon">
    <link href="profile_style.css" rel="stylesheet">
    <link href="profile_layout.css" rel="stylesheet">
  </head>
  <body>
    <div class="header">
      <h1><a href="wall.php">ONLINE 420</a></h1>
      <form id="logout" action="logout.php">
        <input type="submit" value="Log out" >
      </form>
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
</html>
