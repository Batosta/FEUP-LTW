<!DOCTYPE html>
<html lang="en-US"> 
  <head>
    <title>Wall</title>
    <link href="favicon.ico" rel="shortcut icon">
    <link href="wall_style.css" rel="stylesheet">
    <link href="wall_layout.css" rel="stylesheet">  
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

      <?php
        $dbh = new PDO('sqlite:database.db');
        include ('user_functions.php');

        $stmt = $dbh->prepare('SELECT * FROM Post');
        $stmt->execute();
        $posts = $stmt->fetchAll();
        foreach ($posts as $post) {
          $post_id = $post['postID'];
          showPostByPostId($dbh, $post_id);
        }
      ?>
      <form class="posts" action="show_posts.php">
        <input type="submit" value="Show all posts">
      </form>
    </div>
  </body>
</html>
