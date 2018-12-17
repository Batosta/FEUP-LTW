<!DOCTYPE html>
<html lang="en-US"> 
  <?

    $dbh = new PDO('sqlite:database.db');
    include ('account_functions.php');
    include ('utilities_functions.php');
    include ('./session.php');

    $account_id = $_SESSION['accountID'];
    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);
    $accountName = getAccountName($dbh, $account_id);
    $accountEmail = getAccountEmail($dbh, $account_id);
    $accountBirthday = getAccountBirthday($dbh, $account_id);
    $accountCity = getAccountCity($dbh, $account_id);
    $accountJob = getAccountJob($dbh, $account_id);
  ?>
  <head>
    <title>Edit Profile</title> 
    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/change_profile.css" rel="stylesheet">
    <link href="../imagens/icon.png" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300, 300i|Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300" rel="stylesheet">
  </head>
  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>

    <div class="main">

      <div class="profilePic">

        <div id="profilePicHeader" class="profilePicHeader">
          <img src="../imagens/edit.png" height="20" width="20">
          <h2> Edit Profile </h2>
        </div>

        <img id="profilephoto" src="../imagens/<?=$accountPhoto?>"" alt="Profile photo" height="200" width="200">
        <form action="uploadUserImage.php" method="post" enctype="multipart/form-data">
          Select image to upload: 
          <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
          <input id="submit" type="submit" value="Change Image" name="submit">
        </form>
      </div>

      <div class="editInfo"> 
        <h4 id="usernameEdit" onclick="openUsername()"><?=$accountUsername ?></h4>
        <h4 onclick="openName()"><?=$accountName ?></h4>
        <h4 onclick="openEmail()"><?=$accountEmail ?></h4>
        <h4 onclick="openBirthday()"><?=$accountBirthday ?></h4>
        <h4 onclick="openCity()"><?=$accountCity ?></h4>
        <h4 onclick="openJob()"><?=$accountJob ?></h4>

      <div class="changeName" id="changeName">
        <label for="new_info"> Name </label>
        <form id="change" action="change_profile_functions.php" method="post">
          <input type="text" name="new_info" placeholder="Change Name">
          <input id="submitButton" type="submit" class="button" name="change_name" value="Change" >
        </form>
      </div>

      <div class="changeUsername" id="changeUsername">
        <label for="new_info"> Username </label>
        <form id="change" action="change_profile_functions.php" method="post">
          <input type="text" name="new_info" placeholder="Change Username">
          <input id="submitButton" type="submit" class="button" name="change_username" value="Change" >
        </form>
      </div>

      <div class="changeEmail" id="changeEmail"> 
        <label for="new_info"> Email </label>
        <form id="change" action="change_profile_functions.php" method="post">
          <input type="text" name="new_info" placeholder="Change Email">
          <input id="submitButton" type="submit" class="button" name="change_email" value="Change" >
        </form>
      </div>

      <div class="changeBirthday" id="changeBirthday">
        <label for="new_info"> Birthday </label>
        <form id="change" action="change_profile_functions.php" method="post">
          <input type="text" name="new_info" placeholder="Change Birthday">
          <input id="submitButton" type="submit" class="button" name="change_birthday" value="Change" >
        </form>
      </div>

      <div class="changeCity" id="changeCity">
        <label for="new_info"> City </label>
        <form id="change" action="change_profile_functions.php" method="post">
          <input type="text" name="new_info" placeholder="Change City">
          <input id="submitButton" type="submit" class="button" name="change_city" value="Change" >
        </form>
      </div>

      <div class="changeJob" id="changeJob">
        <label for="new_info"> Job </label>
        <form id="change" action="change_profile_functions.php" method="post">
          <input type="text" name="new_info" placeholder="Change Job">
          <input id="submitButton" type="submit" class="button" name="change_job" value="Change" >
        </form>
      </div>

       <script>
        function openName() {
          document.getElementById("changeName").style.display = "block";
        }

        function openUsername() {
          document.getElementById("changeUsername").style.display = "block";
        }

        function openEmail() {
          document.getElementById("changeEmail").style.display = "block";
        }

        function openBirthday() {
          document.getElementById("changeBirthday").style.display = "block";
        }

        function openCity() {
          document.getElementById("changeCity").style.display = "block";
        }

        function openJob() {
          document.getElementById("changeJob").style.display = "block";
        }

        function closeForm() {
          document.getElementById("submitButton").style.display = "none";
        }
      </script>


    </div>

    </div>
  </body>

  <? draw_footer(); ?>

</html>