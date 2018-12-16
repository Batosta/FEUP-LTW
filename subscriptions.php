<!DOCTYPE html>
<html lang="en-US"> 
  <?
    $dbh = new PDO('sqlite:database.db');
    include ('user_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];
    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);

    $channel_ids = getChannelIDs($dbh, $account_id);
  ?>

  <head>
    <title>Profile</title> 
    <link href="imagens/icon.png" rel="shortcut icon">
    <link href="css/common.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>

    <? draw_header($accountPhoto, $accountUsername); ?>

    <div class="main">
      <section id="bio">
        <h1> Following Channels </h1>
        <? 
          foreach($channel_ids as $channel_id){

            $channel_name = getChannelName($dbh, $channel_id[0]);
        ?>
        <a href="channel.php?id=<?=$channel_id[0]?>"><p><?=$channel_name?></p></a>
        <? } ?>
      </section>
    </div>  
  </body>

  <? draw_footer(); ?>

</html>
