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

      <div class="mainMenu">

        <a href="#"> Latest Music </a>
        <a href="#"> Album Reviews </a>
        <a href="#"> Single Reviews </a>
        <a href="#"> Music Discussions </a>
     </div>

    <div class="main">


    <button id="myBtn">Create Post</button>

  
      <div id="myModal" class="modal">

        <form class="modal-content" action="createNewPost.php" method="post">

          <div class="minidiv"> 

            <label>
              <textarea id="title" name="title" placeholder="Title" required="required"></textarea>
            </label>

            <label>
              <textarea name="description" placeholder="Description" required="required"></textarea>
            </label>

            <span class="close">&times;</span>

             <label>
            <?
            foreach($account_channels as $account_channel) {

              $channel_name = getChannelName($dbh, $account_channel['channelID']); 
            ?>
            <input type="radio" name="channel" value="<?=$account_channel['channelID']?>" checked="checked"><?=$channel_name?>
            <? } ?>
            </label>

          </div>

           <form action="upload.php" method="post" enctype="multipart/form-data">
             Select image to upload: 
            <div class="buttons"> 
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input id="submit" type="submit" value="Upload Image" name="submit">
          </form>
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
