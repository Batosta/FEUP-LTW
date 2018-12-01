<!DOCTYPE html>
<html lang="en-US">
  <?php
    $dbh = new PDO('sqlite:database.db');
    include ('user_functions.php');
  ?>
  <head>
    <title>Wall</title>
    <link href="favicon.ico" rel="shortcut icon">
    <link href="wall_style.css" rel="stylesheet">
    <link href="wall_layout.css" rel="stylesheet">  
    <link href="post_style.css" rel="stylesheet">
    <link href="post_layout.css" rel="stylesheet">  
  </head>
  <body>
    <div class="header">
      <h1><a href="wall.php">ONLINE 420</a></h1>
      <form id="search_users" action="search_users.php" method="post">
        <input type="text" name="userName" placeholder="Search users">
        <input type="submit" value="Search" >
      </form>
    </div>

    <div class="main">
      <?
        showAllPosts($dbh);
      ?>
      <form class="posts" action="show_posts.php">
        <input type="submit" value="Show all posts">
      </form>
    </div>
  </body>
</html>
