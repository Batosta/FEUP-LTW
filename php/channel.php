<!DOCTYPE html>
<html lang="en-US"> 
  <?
    $dbh = new PDO('sqlite:database.db');

    include ('account_functions.php');
    include ('channel_functions.php');
    include ('post_functions.php');
    include ('utilities_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];

    $channel_id = $_GET['id'];
    $channel_name = getChannelName($dbh, $channel_id);
    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);

    $subscription = getSubscription($dbh, $account_id, $channel_id);
    $number_subscribers = getNumberSubscriber($dbh, $channel_id);
  ?>

  <head>
    <title><?=$channel_name?></title> 
    <link href="../imagens/icon.png" rel="shortcut icon">
    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/channel.css" rel="stylesheet">
    <link href="../css/post_style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>

    <div class="main">
      <section id="bio">
        <a href="channel.php?id=<?=$channel_id?>"><p><?=$channel_name?></p></a>
        <form id="subsription" action="subscribe.php" method="post">
          <input type="hidden" name="subscription" value="<?=$subscription?>">
          <input type="hidden" name="channelID" value="<?=$channel_id?>">
          <input type="hidden" name="accountID" value="<?=$account_id?>">
          <?
          if($subscription == 1) { ?>
            <input type="submit" value="Unsubscribe"> 
          <? }
          else{ ?>
            <input type="submit" value="Subscribe"> 
          <? } ?>
        </form>
        <h2>Subscribers: <?=$number_subscribers?></h2>
      </section>
      <section id="posts">

        <?
          if($subscription == 1) {

            createPost($channel_id);
            showAllChannelPosts($dbh, $channel_id, $account_id);
          }
          else { ?>

            <h3>Subscribe this channel to see their posts and to publish your own</h3>
        <?} ?>  
      </section>
    </div>  
  </body>

  <? draw_footer() ?> 

</html>
