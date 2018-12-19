<!DOCTYPE html>
<html lang="en-US"> 
  <?
    $dbh = new PDO('sqlite:database.db');
    include ('account_functions.php');
    include ('channel_functions.php');
    include ('utilities_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];
    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);
    $channel_ids = getChannelIDs($dbh, $account_id);
  ?>

  <head>
    <title>Subscription</title> 
    <link href="../imagens/icon.png" rel="shortcut icon">
    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/subscriptions.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>

    <? draw_header($accountPhoto, $accountUsername); ?>

    <div class="main">
      <section id="bio">
        <h1> Following </h1>
        <div class="following"> 
        <? 
        
          if($channel_ids == null)
            echo 'You are not following any channels at the moment. Try the discover page to find new channels to subscribe to!';
          else{  
            foreach($channel_ids as $channel_id){

              $channel_name = getChannelName($dbh, $channel_id[0]);
        ?>
        <a href="channel.php?id=<?=$channel_id[0]?>"><?=$channel_name?>
        <form id="subscription" action="subscribe.php" method="post">
          <input type="hidden" name="subscription" value="1">
          <input type="hidden" name="channelID" value="<?=$channel_id['channelID']?>">
          <input type="hidden" name="accountID" value="<?=$account_id?>">
          <input type="submit" value="Unsubscribe"> 
        </form>
        </a>
        <? }}  ?>
        </div>
      </section>
    </div> 

      <? draw_footer(); ?> 
  </body>
</html>
