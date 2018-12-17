<!DOCTYPE html>
<html lang="en-US">
  <?php
    $dbh = new PDO('sqlite:database.db');
    include ('account_functions.php');
    include ('channel_functions.php');
    include ('utilities_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];
    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);
    $account_channels = getChannelIDs($dbh, $account_id);

    $discover_channels = discoverChannels($dbh, $account_id);
  ?>
  <head>
    <title>Home Page</title>
    <link href="../imagens/icon.png" rel="shortcut icon">
    <link href="../css/wall.css" rel="stylesheet">
    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/post_style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>
    
    <div class="mainContent">

      <div class="miniHeader"> 
        <img src="../imagens/music.png" width="30" height="30">
        <h2 id="siteName"> Aria </h2>
      </div>

      <div class="subscriptions">

        <? 
        foreach($discover_channels as $discover_channel){

          $channel_name = getChannelName($dbh, $discover_channel['channelID']);
        ?>
        <a href="channel.php?id=<?=$discover_channel['channelID']?>"><?=$channel_name?></a>
        <? } ?>
      </div>
    </div>
    <div class="main">
    </div>


  </body>

  <? draw_footer(); ?>
</html>
