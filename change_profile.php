<!DOCTYPE html>
<html lang="en-US"> 
  <?

    $dbh = new PDO('sqlite:database.db');
    include ('user_functions.php');
    include ('./session.php');

    $account_id = $_SESSION['accountID'];
    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);
  ?>
  <head>
    <title>Edit Profile</title> 
    <link href="favicon.ico" rel="shortcut icon">
    <link href="profile.css" rel="stylesheet">
    <link href="common.css" rel="stylesheet">
  </head>
  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>

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

  <? draw_footer(); ?>

</html>
