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

      <h2 id="siteName"> Aria </h2>

      <div class="mainMenu">

        <a href="#"> Latest Music </a>
        <a href="#"> Album Reviews </a>
        <a href="#"> Single Reviews </a>
        <a href="#"> Music Discussions </a>
     </div>

    <div class="main">
      
      <button id="myBtn">Create Post</button>

      <div id="myModal" class="modal">

        <div class="modal-content">
          <div class="minidiv"> 
            <label>
              <textarea name="text" placeholder="Type your comment here..."></textarea>
            </label>
            <span class="close">&times;</span>
          </div>
         <label>
          <p>Tags : </p>
          <textarea id="tags" name="text"></textarea>
        </label>
        <div class="buttons"> 
        <button id="uploadImage"> Upload Image </button>
        <button id="enter"> Post </button>
        </div>
      </div>

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
