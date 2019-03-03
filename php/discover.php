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
    <title>Discover</title>
    <link href="../imagens/icon.png" rel="shortcut icon">
    <link href="../css/discover.css" rel="stylesheet">
    <link href="../css/common.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>
    
  <? draw_header($accountPhoto, $accountUsername); ?>
    
  <div class="main">
      <section id="bio">
        <h1> Discover channels </h1>
        <div class="following"> 
        <? 
        foreach($discover_channels as $discover_channel){

          $channel_name = getChannelName($dbh, $discover_channel['channelID']);
        ?>
        <a href="channel.php?id=<?=$discover_channel['channelID']?>"><?=$channel_name?>
        <form id="subscription" action="subscribe.php" method="post">
          <input type="hidden" name="subscription" value="0">
          <input type="hidden" name="channelID" value="<?=$discover_channel['channelID']?>">
          <input type="hidden" name="accountID" value="<?=$account_id?>">
          <input type="submit" value="Subscribe"> 
        </form>
        </a>
        <? }  ?>
        </div>
      </section>
    </div> 
  
  </body>

  <? draw_footer(); ?>
</html>

 