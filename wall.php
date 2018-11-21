<!DOCTYPE html>
<html lang="en-US"> 
  <head>
    <title>Wall</title>  
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
          $account_id = $post['accountID'];
      ?>
      <div class="post"> 
        <section id="info">
          <?
          $post_photo = getAccountPhoto($dbh, $account_id);
          $post_username = getAccountUsername($dbh, $account_id);
          ?>
          <img id="account_photo" src=<?=$post_photo?> alt="Account photo" height="50" width="50">
          <h2 id="username"><?=$post_username?></h2>
          <img id="post_photo" src=<?=$post['photo']?> alt="Post photo">
          <h3 id="description"><?=$post['description']?></h3>
        </section>
        <section id="options">
          <h4>like, comment, share</h4>
        </section>
        <?
          $stmt1 = $dbh->prepare('SELECT DISTINCT accountID, commentText FROM Comment WHERE postID = ?');
          $stmt1->execute(array($post_id));
          $comments = $stmt1->fetchAll();
          foreach ($comments as $comment) {
        ?>
        <section id="comments">
          <?
            $comment_photo = getAccountPhoto($dbh, $comment['accountID']);
          ?>
          <img id="comment_photo" src=<?=$comment_photo?> alt="Comment photo" height="40" width="40">
          <h4><?=$comment['commentText']?></h4>
          <?
            $stmt4 = $dbh->prepare('SELECT DISTINCT accountID, sucommentText FROM SubComment WHERE commentID = ?');
            $stmt4->execute(array($comment[0]));
            $subcomments = $stmt4->fetchAll();
            foreach ($subcomments as $subcomment) {
          ?>
          <section id="subcomments">
            <?
              $subcomment_photo = getAccountPhoto($dbh, $subcomment['accountID']);
            ?>
            <img id="subcomment_photo" src=<?=$subcomment_photo?> alt="Subcomment photo" height="30" width="30">
            <h5><?=$subcomment['sucommentText']?></h5>
          </section>
          <? } ?>
        </section>
        <? } ?>
      </div>
      <? } ?>

      <form class="posts" action="show_posts.php">
        <input type="submit" value="Show all posts">
      </form>
    </div>
  </body>
</html>
