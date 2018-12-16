<?php

    include_once("./encryption.php");


    function getUserID($dbh, $username){

        $stmt = $dbh->prepare('SELECT accountID FROM Account WHERE username = ?');
        $stmt->execute(array($username));
        $row = $stmt->fetch();

        return $row['accountID'];
    }
    function getAccountName($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT personName FROM Account WHERE accountID = ?');
        $stmt->execute(array($accountID));
        $row = $stmt->fetch();

        return $row['personName'];
    }
    function getAccountEmail($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT email FROM Account WHERE ? = accountID');
        $stmt->execute(array($accountID));
        $row = $stmt->fetch();

        return $row['email'];
    }
    function getAccountUsername($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT username FROM Account WHERE ? = accountID');
        $stmt->execute(array($accountID));
        $row = $stmt->fetch();

        return $row['username'];
    }
    function getAccountBirthday($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT birthday FROM Account WHERE ? = accountID');
        $stmt->execute(array($accountID));
        $row = $stmt->fetch();

        return $row['birthday'];
    }
    function getAccountCity($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT city FROM Account WHERE ? = accountID');
        $stmt->execute(array($accountID));
        $row = $stmt->fetch();

        return $row['city'];
    }
    function getAccountJob($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT job FROM Account WHERE ? = accountID');
        $stmt->execute(array($accountID));
        $row = $stmt->fetch();

        return $row['job'];
    }
    function getAccountPhoto($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT photo FROM Account WHERE ? = accountID');
        $stmt->execute(array($accountID)); 
        $row = $stmt->fetch();

        return $row['photo'];
    }
    function getAccountPoints($dbh, $accountID){

        $points = 0;
        $stmt = $dbh->prepare('SELECT points FROM Post WHERE accountID = ?');
        $stmt->execute(array($accountID)); 
        $row = $stmt->fetchAll();

        foreach($row as $post){

            $points += $post['points'];
        }


        return $points;
    }
    function getPostPoints($dbh, $postID){

        $stmt = $dbh->prepare('SELECT points FROM Post WHERE postID = ?');
        $stmt->execute(array($postID));

        $row = $stmt->fetch();

        return $row['points'];
    }


    function checkPassword($dbh, $username, $password){

        $pass = encryptPass($password);

        $stmt = $dbh->prepare('SELECT * FROM Account WHERE username = ? AND passW = ?');
        $stmt->execute(array($username, $pass));

        return $stmt->fetch() ? true : false; //returns true if exists
    }


    function getSearchChannel($dbh, $search_text){

        $stmt = $dbh->prepare('SELECT * FROM Channel WHERE description LIKE ?');
        $search_text1 = "%" . $search_text . "%";
        $stmt->execute(array($search_text1));
        $row = $stmt->fetchAll();

        return $row;
    }
    function getSearchPost($dbh, $search_text){
     
        $stmt = $dbh->prepare('SELECT * FROM Post WHERE title LIKE ?');
        $search_text1 = "%" . $search_text . "%";
        $stmt->execute(array($search_text1));
        $row = $stmt->fetchAll();

        return $row;
    }


    function getSubscription($dbh, $accountID, $channelID){

        $cIDs = getChannelIDs($dbh, $accountID);

        foreach($cIDs as $cID){

            if($cID['channelID'] == $channelID)
                return 1;
        }
        return 0;
    }
    function getNumberSubscriber($dbh, $channelID){

        $stmt = $dbh->prepare('SELECT COUNT(*) FROM ChannelUsers WHERE channelID = ?');
        $stmt->execute(array($channelID));
        $row = $stmt->fetch();
        
        return $row[0];
    }
    function getChannelIDs($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT channelID FROM ChannelUsers WHERE ? = accountID');
        $stmt->execute(array($accountID)); 
        $row = $stmt->fetchAll();

        return $row;
    }
    function getChannelName($dbh, $channelID){

        $stmt = $dbh->prepare('SELECT description FROM Channel WHERE ? = channelID');
        $stmt->execute(array($channelID)); 
        $row = $stmt->fetch();

        return $row['description'];
    }
    function getPostChannelID($dbh, $postID){

        $stmt = $dbh->prepare('SELECT channelID FROM Post WHERE ? = postID');
        $stmt->execute(array($postID)); 
        $row = $stmt->fetch();

        return $row['channelID'];
    }
    function getPostChannelName($dbh, $postID){

        $channelID = getPostChannelID($dbh, $postID);
        $channel_name = getChannelName($dbh, $channelID);
        return $channel_name;
    }
    function showAllChannelPosts($dbh, $channelID, $accountID){

        $stmt = $dbh->prepare('SELECT * FROM Post WHERE channelID = ?');
        $stmt->execute(array($channelID));
        $result = $stmt->fetchAll();
        foreach($result as $post){

            $postID = $post['postID'];
            showPostByPostId($dbh, $postID, $accountID);
        }
    }
    function showAllPosts($dbh, $accountID) {
        
        $stmt = $dbh->prepare('SELECT channelID FROM ChannelUsers WHERE accountID = ?');
        $stmt->execute(array($accountID));
        $channelIDs = $stmt->fetchAll();

        foreach ($channelIDs as $channelID) {

            showAllChannelPosts($dbh, $channelID['channelID'], $accountID);
        }
    }

    function showPostByPostId($dbh, $postID, $accountID){

        $stmt = $dbh->prepare('SELECT * FROM Post WHERE postID = ?');
        $stmt->execute(array($postID));
        $post = $stmt->fetch();

        $postAccountID = $post['accountID']; ?>

        <div class="post">
            <section id="info">
                <?
                    $post_photo = getAccountPhoto($dbh, $postAccountID);
                    $post_username = getAccountUsername($dbh, $postAccountID);
                    $channel_name = getPostChannelName($dbh, $postID);
                    $channel_id = getPostChannelID($dbh, $postID);
                    $post_points = getPostPoints($dbh, $postID);
                ?> 
                <div class="userInfo"> 
                    <img id="account_photo" src=<?=$post_photo?> alt="Account photo" height="40" width="40">
                    <h2 id="username"><?=$post_username?></h2>
                    <a id="channel_name" href="channel.php?id=<?=$channel_id?>"><?=$channel_name?></a>
                </div>
                <div class="title">
                    <h2 id="title"><?=$post['title']?></h2>
                </div>
                <img id="post_photo" src=<?=$post['photo']?> alt="Post photo">
                <h3 id="description"><?=$post['description']?></h3>
                <section id="points">
                    <article class="currentPoints">
                        <span class="points">Points: <?=$post_points?></span>

                        <form>
                            <input type="hidden" name="postID" value="<?=$postID?>">
                            <input type="hidden" name="accountID" value="<?=$postAccountID?>">
                            <input type="hidden" name="post_points" value="<?=$post_points?>"> 
                            <input id="upvote" type="submit" name="like" value="like">
                        </form>
                    </article>
                </section>
            </section>

            <?
                $stmt1 = $dbh->prepare('SELECT commentID, accountID, commentText FROM Comment WHERE postID = ?');
                $stmt1->execute(array($postID));
                $existentComments = $stmt1->fetchAll();
                foreach ($existentComments as $existentComment) {
            ?>

            <section id="existentComments">
                <?
                    $comment_photo = getAccountPhoto($dbh, $existentComment['accountID']);
                ?>
                <div class="commenterInfo"> 
                    <img id="comment_photo" src=<?=$comment_photo?> alt="Comment photo" height="35" width="35">
                    <h4><?=getAccountUsername($dbh, $existentComment['accountID'])?></h4>
                </div>
                <h4><?=$existentComment['commentText']?></h4>
                <? 
                if($accountID == $existentComment['accountID']){ ?>
                    <form action="deleteComment.php" method="post">
                        <input type="hidden" name="commentID" value="<?=$existentComment['commentID']?>">
                        <input class="button" type="submit" name="remove" value="Delete comment">
                    </form>
                <? } ?>
            </section>
            <? } ?>
            <section class="comments">
                <article class="comment">
                    <span class="accountID"></span>
                    <p></p>
                </article>
                <form>
                    <h2>Add your comment</h2>
                    <label>
                        <textarea name="text" required="required"></textarea>
                    </label>
                    <input type="hidden" name="postID" value="<?=$postID?>">
                    <input type="hidden" name="accountID" value="<?=$accountID?>">
                    <input class="button" type="submit" name="submit" value="Submit">
                </form>
            </section>
            <script src="script.js" defer></script>
        </div>
<?  }

    function showPostByAccountId($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT * FROM Post WHERE accountID = ?');
        $stmt->execute(array($accountID));
        $result = $stmt->fetchAll();

        foreach ($result as $post) {

            $postID = $post['postID'];
            showPostByPostId($dbh, $postID, $accountID);
        }
    }


    function draw_header($accountPhoto, $accountUsername) { ?>

        <div class="navBar">

            <div class="menu">
                <img src="imagens/menu.png" height="25" width="25">
                <div class="menuContent">
                    <a id="homePage" href="wall.php"><p>Home Page</p></a>
                    <a id="settings" href="change_profile.php"><p>Edit profile</p></a>
                    <a id="subs" href="subscriptions.php"><p>Subscriptions</p></a>
                    <a id="likes" href="#"><p>Liked</p></a>
                </div>
            </div>

            <div class="user">
                <a href="profile.php"><img src="<?=$accountPhoto?>" height = "25" width="25"></a>
                <a id="tinyName" href="profile.php"><?=$accountUsername?></a>
            </div>

            <div class="searchBar">
                <form action="search.php" method="post">
                    <input type="text" name="search" placeholder="Search something in your profile">
                </form>
            </div>
              
            <div class="logOut">
                <img src="imagens/turn-on.png" height="25" width="25">
                <div class="logOutContent">
                    <a id="logOut" href="logout.php"><p>Sign Out</p></a>
                    <a id="user" href="logotheraccount.php"><p>Sign into other account </p></a>
                </div>
            </div>
        </div>
    <? }

    function updateUserPhoto($userID, $photoPath) {
    
        try {
          $stmt = $dbh->prepare('UPDATE Account SET photo = ? WHERE accountID = ?');
          if($stmt->execute(array($photoPath, $userID)))
              return true;
          else
              return false;
        }catch(PDOException $e) {
          return false;
        }
    } 


    function uploadUserImage() {
        
      $target_dir = "../profilePictures/";
      $originalName = basename($_FILES["fileToUpload"]["name"]);
      $imageFileType = pathinfo($originalName,PATHINFO_EXTENSION);
      $target_file = $target_dir . getUserID() . "." . $imageFileType ;
      $uploadOk = 1;
     
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        $_SESSION['ERROR'] = "ERROR: Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      //Overide previous picture
      if (file_exists($target_file)) {
        unlink($target_file);
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $_SESSION['ERROR'] =  "Error uploading photo";

      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          if(updateUserPhoto(getUserID(), getUserID() . "." . $imageFileType) == null){
            $_SESSION['ERROR'] = "Error uploading photo";
          }
        } else {
            $_SESSION['ERROR'] =  "Error uploading photo";
        }
      }
    }

    function draw_footer() { ?>

        <footer>
            <div class="about">
                <p>About Us  <p>
            </div>
            <div class="ltw">
                <a id="ltw" href="https://web.fe.up.pt/~arestivo/page/courses/2018/ltw/" target="_blank"><p>Linguagens & Tecnoglogias Web</p></a>
            </div>
            <div class="contacts">
                <p> Contact </p>
            </div>
        </footer>
    <? } ?>

