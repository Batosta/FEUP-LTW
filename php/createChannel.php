<!DOCTYPE html>
<html lang="en-US"> 
  <?
    include ('./account_functions.php');
    include ('./utilities_functions.php');
    include ('./session.php');
    
    $dbh = new PDO('sqlite:database.db');

    $accountID = $_SESSION['accountID'];
    $accountUsername = getAccountUsername($dbh, $accountID);
    $accountPhoto = getAccountPhoto($dbh, $accountID);
  ?>
  <head>
    <title>Create Channel</title> 
    <link href="../favicon.ico" rel="shortcut icon">
    <link href="../css/profile.css" rel="stylesheet">
    <link href="../css/common.css" rel="stylesheet">
  </head>
  
  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>

    <div class="main">
      <form id="createChannel" action="createNewChannel.php" method="post">
        <input type="text" name="description" placeholder="Description">
        <input type="submit" class="button" name="create_channel" value="Create" >
      </form>
    </div>
  </body>

  <? draw_footer(); ?>

</html>
