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
    function getPostChannelName($dbh, $postID){

        $stmt = $dbh->prepare('SELECT channelID FROM Post WHERE ? = postID');
        $stmt->execute(array($postID)); 
        $row = $stmt->fetch();

        $channel_name = getChannelName($dbh, $row['channelID']);
        return $channel_name;
    }
    function showAllChannelPosts($dbh, $channelID){

        $stmt = $dbh->prepare('SELECT * FROM Post WHERE channelID = ?');
        $stmt->execute(array($channelID));
        $result = $stmt->fetchAll();
        foreach($result as $post){

            $postID = $post['postID'];
            showPostByPostId($dbh, $postID);
        }
    }
    function showAllPosts($dbh, $accountID) {
        
        $stmt = $dbh->prepare('SELECT channelID FROM ChannelUsers WHERE accountID = ?');
        $stmt->execute(array($accountID));
        $channelIDs = $stmt->fetchAll();

        foreach ($channelIDs as $channelID) {

            showAllChannelPosts($dbh, $channelID['channelID']);
        }
    }

    function showPostByPostId($dbh, $postID){

        $stmt = $dbh->prepare('SELECT * FROM Post WHERE postID = ?');
        $stmt->execute(array($postID));
        $post = $stmt->fetch();

        $accountID = $post['accountID']; ?>

        <style>

        #info {
            display:flex;
            background-color: rgba(250,250,250,0.6);
            border-radius: 10px;
            padding: 10px;
            flex-direction: column;
        }

        #upvote, #downvote {
            background-color: transparent;
            background-repeat: no-repeat;
            outline: none;
            border: none;
            background-size: 30px;
            height: 40px;
            width: 40px;
            font-size: 2px;
            color: transparent;
        }


        #upvote {
            background-image: url('imagens/upvote.png');
            position: absolute;
            right: 8%;
            top: 100%;
        }

        #downvote {
            background-image: url('imagens/downvote.png');
            position: absolute;
            right: 15%;
            top: 100%;
        }


        #downvote:hover, #downvote:focus {
            background-image: url('imagens/downvoted.png');
        }

        #upvote:hover, #upvote:focus {
            background-image: url('imagens/upvoted.png');
        }

        #channel_name {
            font-weight: 300;
            font-size: 15px;
            float: left;
            font-style: italic;
        }

        #username {
            font-size: 15px;
            font-weight: 200;
            float: left;
            margin-right: 5px;
            margin-left: 10px;
        }

        #account_photo {
            border-radius: 3px;
            float: left;
        }

        .userInfo {
            display: flex;
            align-items: center;
        }

        #username:after {  content:" •";}

        #channel_name:after { content:" :"; }

        #post_photo {
            padding: 10px;
            width: 40%;
            height:40%;
        }

        #description { font-weight: 300; }

        #existentComments {
            display: block;
            background-color: rgba(250,250,250,0.6);
            padding: 10px;
            padding-left: 25px;
        }

        #comment_photo {
            border-radius: 3px;
            width: 35px;
            height:35px;
        }

        </style>

        <div class="post">
            <section id="info">
                <?
                    $post_photo = getAccountPhoto($dbh, $accountID);
                    $post_username = getAccountUsername($dbh, $accountID);
                    $channel_name = getPostChannelName($dbh, $postID);
                    $post_points = getPostPoints($dbh, $postID);
                ?> 
                <div class="userInfo"> 
                    <img id="account_photo" src=<?=$post_photo?> alt="Account photo" height="35" width="35">
                    <h2 id="username"><?=$post_username?></h2>
                    <h3 id="channel_name"><?=$channel_name?></h3>
                </div>
                <img id="post_photo" src=<?=$post['photo']?> alt="Post photo">
                <h3 id="description"><?=$post['description']?></h3>
                <section id="points">
                    <article class="currentPoints">
                        <span class="points">Points: <?=$post_points?></span>

                        <form>
                            <input type="hidden" name="postID" value="<?=$postID?>">
                            <input type="hidden" name="accountID" value="<?=$account_id?>">
                            <input type="hidden" name="post_points" value="<?=$post_points?>">
                            <input id="upvote" type="submit" name="like" value="Like">
                            <input id="downvote" type="submit" name="dislike" value="Dislike">
                        </form>

                    </article>
                </section>

            </section>

            <?
                $stmt1 = $dbh->prepare('SELECT DISTINCT accountID, commentText FROM Comment WHERE postID = ?');
                $stmt1->execute(array($postID));
                $existentComments = $stmt1->fetchAll();
                foreach ($existentComments as $existentComment) {
            ?>

                <section id="existentComments">
                    <?
                        $comment_photo = getAccountPhoto($dbh, $existentComment['accountID']);
                    ?>
                    <img id="comment_photo" src=<?=$comment_photo?> alt="Comment photo" height="40" width="40">
                    <h4><?=getAccountUsername($dbh, $existentComment['accountID'])?></h4>
                    <h4><?=$existentComment['commentText']?></h4>
                </section>
            <? } ?>
            <section id="comments">
                <article class="comment">
                    <span class="accountID"><?=$comment['accountID']?></span>
                    <p> </p>
                    <p><?=$comment['commentText']?></p>
                </article>
                <form>
                    <h2>Add your comment</h2>
                    <label>
                        <textarea name="text"></textarea>
                    </label>
                    <input type="hidden" name="postID" value="<?=$postID?>">
                    <input type="hidden" name="accountID" value="<?=$accountID?>">
                    <input type="submit" name="submit" value="Submit">
                </form>
            </section>
        </div>

<?  }

    function showPostByAccountId($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT * FROM Post WHERE accountID = ?');
        $stmt->execute(array($accountID));
        $result = $stmt->fetchAll();

        foreach ($result as $post) {

            $postID = $post['postID'];
            showPostByPostId($dbh, $postID);
        }
    }


    function draw_header() { ?>

        <div class="navBar">

            <div class="menu">
                <img src="imagens/menu.png" height="25" width="25">
                <div class="menuContent">
                    <a id="homePage" href="profile.php"><p>Profile</p></a>
                    <a id="settings" href="change_profile.php"><p>Edit profile</p></a>
                    <a id="subs" href="subscriptions.php"><p>Subscriptions</p></a>
                    <a id="likes" href="#"><p>Liked</p></a>
                </div>
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