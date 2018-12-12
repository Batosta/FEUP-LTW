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


    function checkPassword($dbh, $username, $password){

        $pass = encryptPass($password);

        $stmt = $dbh->prepare('SELECT * FROM Account WHERE username = ? AND passW = ?');
        $stmt->execute(array($username, $pass));

        return $stmt->fetch() ? true : false; //returns true if exists
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
    function showAllPosts($dbh) {

        $stmt = $dbh->prepare('SELECT * FROM Post');
        $stmt->execute();
        $posts = $stmt->fetchAll();
        foreach ($posts as $post) {
            $post_id = $post['postID'];
            showPostByPostId($dbh, $post_id);
        }
    }

    function getAccountPoints($dbh, $post_id){

        $stmt = $dbh->prepare('SELECT points FROM Post WHERE postID = ?');
        $stmt->execute(array($post_id));

        $row = $stmt->fetch();

        return $row['points'];

    }

    function showPostByPostId($dbh, $postID){

        $stmt = $dbh->prepare('SELECT * FROM Post WHERE postID = ?');
        $stmt->execute(array($postID));
        $post = $stmt->fetch();

        $account_id = $post['accountID']; ?>

        <style>

        #info {
            display:flex;
            background-color: rgba(250,250,250,0.6);
            border-radius: 10px;
            border-width: thick;
            border-color: rgba(250, 250, 250, 1);
            padding: 10px;
            flex-direction: column;
            
        }

        #like {
            display: flex;
            background-image: url('imagens/love.png');
            background-repeat: no-repeat;
            background-size: 5%;
            padding: 10px;
            background-position: bottom right;
            color: rgba(0,0,0,0);
            margin-right: 25px;
        }

        #like:hover {
            background-image: url('imagens/loved.png');
        }

        #channel_name {
            font-weight: 300;}

      /*  #like:clicked {
            background-image: url('imagens/loved.png'); 
        }*/

        #username {
            position: absolute;
            top: 17.5%;
            left: 38.5%;
            font-size: 15px;
            font-weight: 200;
        }

        #account_photo {border-radius: 3px;}

        #username:after {content: " : ";}

        #post_photo {
            padding: 10px;
            width: 40%;
            height:40%;
        }

        #description { font-weight: 300; }

        </style>

        <div class="post">
            <section id="info">
                <?
                    $post_photo = getAccountPhoto($dbh, $account_id);
                    $post_username = getAccountUsername($dbh, $account_id);
                    $channel_name = getPostChannelName($dbh, $postID);
                    $post_points = getAccountPoints($dbh, $post_id);
                ?> 
                <img id="account_photo" src=<?=$post_photo?> alt="Account photo" height="35" width="35">
                <h3 id="channel_name"><?=$channel_name?></h3>
                <h2 id="username"><?=$post_username?></h2>
                <img id="post_photo" src=<?=$post['photo']?> alt="Post photo">
                <h3 id="description"><?=$post['description']?></h3>
                <h3 id="points">Points: <?=$post_points?></h3>
            </section>

            <?
                $stmt1 = $dbh->prepare('SELECT DISTINCT accountID, commentText FROM Comment WHERE postID = ?');
                $stmt1->execute(array($postID));
                $existentComments = $stmt1->fetchAll();
                foreach ($existentComments as $existentComment) {
            ?>


            <style>

            #existentComments {
               
            }


            </style>
                <section id="existentComments">
                    <?
                        $comment_photo = getAccountPhoto($dbh, $existentComment['accountID']);
                    ?>
                    <img id="comment_photo" src=<?=$comment_photo?> alt="Comment photo" height="40" width="40">
                    <h4><?=$existentComment['commentText']?></h4>
                </section>
            <? } ?>
            <section id="comments">
                <article class="comment">
                    <span class="accountID"><?=$comment['accountID']?></span>
                    <p><?=$comment['commentText']?></p>
                </article>
                <form>
                    <h2>Add your comment</h2>
                    <label>
                        <textarea name="text"></textarea>
                    </label>
                    <input type="hidden" name="postID" value="<?=$postID?>">
                    <input type="hidden" name="accountID" value="<?=$account_id?>">
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
?>