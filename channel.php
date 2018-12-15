<!DOCTYPE html>
<html lang="en-US"> 
  <?
    $dbh = new PDO('sqlite:database.db');
    include ('user_functions.php');
    include ('session.php');

    $account_id = $_SESSION['accountID'];

    $channel_id = $_GET['id'];
    $channel_name = getChannelName($dbh, $channel_id);
    $accountUsername = getAccountUsername($dbh, $account_id);
    $accountPhoto = getAccountPhoto($dbh, $account_id);
  ?>

  <head>
    <title><?=$channel_name?></title> 
    <link href="imagens/icon.png" rel="shortcut icon">
    <link href="profile.css" rel="stylesheet">
    <link href="post_style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>
    
    <? draw_header($accountPhoto, $accountUsername); ?>

    <div class="main">
      <section id="bio">
        <a href="channel.php?id=<?=$channel_id?>"><p><?=$channel_name?></p></a>
      </section>
      <section id="posts">
        <?
          showAllChannelPosts($dbh, $channel_id);
        ?>  
      </section>
    </div>  
  </body>

  <? draw_footer() ?>
  <!--<script src="script.js" defer></script>
  <script src="script1.js" defer></script>--> 

</html>
