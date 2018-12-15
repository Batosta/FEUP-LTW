<!DOCTYPE html>
<html lang="en-US"> 
  <?
    $dbh = new PDO('sqlite:database.db');
    include ('user_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];

    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountName = getAccountName($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);
    $accountEmail = getAccountEmail($dbh, $account_id);
    $accountBirthday = getAccountBirthday($dbh, $account_id);
    $accountCity = getAccountCity($dbh, $account_id);
    $accountJob = getAccountJob($dbh, $account_id);

    $account_channels = getChannelIDs($dbh, $account_id);
  ?>

  <head>
    <title>Profile</title> 
    <link href="imagens/icon.png" rel="shortcut icon">
    <link href="profile.css" rel="stylesheet">
    <link href="post_style.css" rel="stylesheet">
    <link href="common.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300, 300i|Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300" rel="stylesheet">
  </head>

  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>

    <div class="main">
      <section id="bio">
        <img src=<?=$accountPhoto ?> alt="Profile photo" height="150" width="150">
        <h2><?=$accountUsername ?></h2>
        <h4><?=$accountName ?></h4>
        <h5><?=$accountEmail ?></h5>
        <h5><?=$accountBirthday ?></h5>
        <h5><?=$accountCity ?></h5>
        <h5><?=$accountJob ?></h5>
      </section>

      <section id="posts">

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
        <?
          showPostByAccountId($dbh, $account_id);
        ?>
        <script src="script1.js" defer></script>
      </section>
   
    <div class="otherPages">   <!--  Fazer share ao site maybe? how tho-->
      <a id="insta" href="https://www.instagram.com" target="_blank"> Instagram</a>
      <a id="face" href="https://www.facebook.com" target="_blank"> Facebook </a>
      <a id="spotify" href="https://open.spotify.com/browse/featured" target="_blank"> Spotify</a>
    </div>
  </div>

  </body>
  <? draw_footer() ?>

</html>
