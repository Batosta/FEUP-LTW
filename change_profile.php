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
    <link href="common.css" rel="stylesheet">
    <link href="change_profile.css" rel="stylesheet">
    <link href="imagens/icon.png" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300, 300i|Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300" rel="stylesheet">
  </head>
  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>

    <div class="main">

      <div class="profilePic">
        <h2> Edit Profile </h2>
        <img src=<?=$accountPhoto ?> alt="Profile photo" height="150" width="150">
        <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload: 
        <p id="fakeButton">Choose image</p>
        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
        <input id="submit" type="submit" value="Upload Image" name="submit">
      </form>
    </div>

      <div class="editInfo"> 
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
  </div>

  </body>

  <? draw_footer(); ?>

</html>
