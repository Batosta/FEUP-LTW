<!DOCTYPE html>
<html lang="en-US">
  <?php
    $dbh = new PDO('sqlite:database.db');
    include ('user_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];
    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);
    $account_channels = getChannelIDs($dbh, $account_id);

  ?>
  <head>
    <title>Home Page</title>
    <link href="imagens/icon.png" rel="shortcut icon">
    <link href="wall.css" rel="stylesheet">
    <link href="common.css" rel="stylesheet">
    <link href="post_style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>
    
    <div class="mainContent">

      <div class="miniHeader"> 
        <img src="imagens/music.png" width="30" height="30">
        <h2 id="siteName"> Aria </h2>
      </div>

      <div class="subscriptions">

        <? 
        foreach($account_channels as $account_channel){

          $channel_name = getChannelName($dbh, $account_channel['channelID']);
        ?>
        <a href="channel.php?id=<?=$account_channel['channelID']?>"><?=$channel_name?></a>
        <? } ?>
      </div>
    </div>

    <div class="main">


    <button id="myBtn">Create Post</button>

    <div id="myModal" class="modal">

      <form class="modal-content" action="createNewPost.php" method="post">
        <div class="minidiv"> 
          <label>
            <textarea name="title" placeholder="Title" required="required"></textarea>
          </label>
          <label>
            <textarea name="photo" placeholder="Photo"></textarea>
          </label>
          <label>
            <textarea name="description" placeholder="Description" required="required"></textarea>
          </label>
          <label>
          <?
            foreach($account_channels as $account_channel) {

              $channel_name = getChannelName($dbh, $account_channel['channelID']); 
          ?>
          <input type="radio" name="channel" value="<?=$account_channel['channelID']?>" checked="checked"><?=$channel_name?>
          <? } ?>
          </label>
          <span class="close">&times;</span>
        </div>
        <div class="buttons"> 
          <button id="enter"> Post </button>
        </div>
      </form>
    </div>

    <script src="script.js" defer></script>

      <?
        showAllPosts($dbh, $account_id);
      ?>
    </div>
  </div>

  </body>

  <? draw_footer(); ?>
</html>
