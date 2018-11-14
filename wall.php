<!DOCTYPE html>
<html lang="en-US"> 
  <head>
    <title>Wall</title>  
    <link href="wall_style.css" rel="stylesheet">
    <link href="wall_layout.css" rel="stylesheet">  
  </head>
  <body>
    <div class="header">
      <h1><a href="wall.html">ONLINE 420</a></h1>
      <form id="search_users" action="search_users.php" method="post">
        <input type="text" name="userName" placeholder="Search users">
        <input type="submit" value="Search" >
      </form>
    </div>

    <div class="main">

      <?php
        $dbh = new PDO('sqlite:database.db');

        $stmt = $dbh->prepare('SELECT * FROM Post');
        $stmt->execute();
        $posts = $stmt->fetchAll();
        foreach ($posts as $post) {
          $post_id =  $post['postID']
      ?>
      <div class="post"> 
        <section id="info">
          <h1><?=$post['accountID']?></h1>
          <h3><?=$post['description']?></h3>
          <img src=<?=$post['photo']?> alt="Post photo">
        <section id="options">
          <h2>like, comment, share</h2>
        </section>
        <?
          $stmt1 = $dbh->prepare('SELECT DISTINCT Comment.postID, commentText, Post.postID FROM Comment, Post WHERE Comment.postID = ?');
          $stmt1->execute(array($post_id));
          $comments = $stmt1->fetchAll();
          foreach ($comments as $comment) {
        ?>
        <section id="comments">
          <h6><?=$comment['commentText']?></h6>
        </section>
        <? } ?>
      </div>
      <? } ?>

      <form class="posts" action="show_posts.php">
        <input type="submit" value="Show all posts">
      </form>
    </body>
</html>
