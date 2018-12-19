<?php

	include_once("account_functions.php");
	include_once("channel_functions.php");
	
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
    function getPostPoints($dbh, $postID){

        $stmt = $dbh->prepare('SELECT points FROM Post WHERE postID = ?');
        $stmt->execute(array($postID));

        $row = $stmt->fetch();

        return $row['points'];
    }
    function getPostEpoch($dbh, $postID){

        $stmt = $dbh->prepare('SELECT epoch FROM Post WHERE postID = ?');
        $stmt->execute(array($postID));
        $row = $stmt->fetch();

        return $row['epoch'];
    }
    function getPostDateHour($dbh, $postID){

        $epoch = getPostEpoch($dbh, $postID);
        
        $dt = new DateTime("@$epoch");
        $dateHour = $dt->format("jS F h:i");

        return $dateHour;
    }
    function epochToDateHour($epoch){

        $dt = new DateTime("@$epoch");
        $dateHour = $dt->format("jS F h:i");

        return $dateHour;
    }
    function getPostComments($dbh, $postID){

        $stmt = $dbh->prepare('SELECT commentID, accountID, commentText FROM Comment WHERE postID = ?');
        $stmt->execute(array($postID));
        $row = $stmt->fetchAll();

        return $row;
    }


    function showAllPosts($dbh, $accountID) {
        
        $stmt = $dbh->prepare('SELECT channelID FROM ChannelUsers WHERE accountID = ?');
        $stmt->execute(array($accountID));
        $channelIDs = $stmt->fetchAll();

        foreach ($channelIDs as $channelID) {

            showAllChannelPosts($dbh, $channelID['channelID'], $accountID);
        }
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
    function showPostByAccountId($dbh, $accountID, $sortID){

        if($sortID == 0)
            $stmt = $dbh->prepare('SELECT * FROM Post WHERE accountID = ? ORDER BY epoch DESC');
        else if($sortID == 1)
            $stmt = $dbh->prepare('SELECT * FROM Post WHERE accountID = ? ORDER BY epoch ASC');
        else if($sortID == 2)
            $stmt = $dbh->prepare('SELECT * FROM Post WHERE accountID = ? ORDER BY points DESC');
        else if($sortID == 3)
            $stmt = $dbh->prepare('SELECT * FROM Post WHERE accountID = ? ORDER BY points ASC');

        $stmt->execute(array($accountID));
        $result = $stmt->fetchAll();

        foreach ($result as $post) {

            $postID = $post['postID'];
            showPostByPostId($dbh, $postID, $accountID);
        }
    }

    function showPostByPostId($dbh, $postID, $accountID){

        $stmt = $dbh->prepare('SELECT * FROM Post WHERE postID = ?');
        $stmt->execute(array($postID));
        $post = $stmt->fetch();

        $postAccountID = $post['accountID'];
        $post_photo = getAccountPhoto($dbh, $postAccountID);
        $post_username = getAccountUsername($dbh, $postAccountID);
        $channel_name = getChannelName($dbh, $post['channelID']);
        ?>

        <div class="post">
            <section id="info">
                <div class="userInfo"> 
                    <img id="account_photo" src="../imagens/<?=$post_photo?>"" alt="Account photo" height="40" width="40">
                    <h2 id="username"><?=$post_username?></h2>
                    <a id="channel_name" href="channel.php?id=<?=$post['channelID']?>"><?=$channel_name?></a>
                    <h2 id="dateHour"><?=epochToDateHour($post['epoch'])?></h2>
                </div>
                <div class="title">
                    <h2 id="title"><?=$post['title']?></h2>
                </div>
               
                <img id="post_photo" src="../imagens/<?=$post['photo']?>"" alt="Post photo">
                <h3 id="description"><?=$post['description']?></h3>
                <section class="points">
                    <article class="currentPoints">
                        <span class="points" value="<?=$post['points']?>">Points: <?=$post['points']?></span> 

                        <button class="upvote"></button>

                        <span type="hidden" name="accountID" value="<?=$accountID?>"></span>
                        <span type="hidden" name="postID" value="<?=$postID?>"></span>
                        
                        <button class="downvote"></button>
                    </article>
                </section>
                <script src="../javascript/script1.js" defer></script>
            </section>

            <?
                $existentComments = getPostComments($dbh, $postID);
                foreach ($existentComments as $existentComment) {
            ?>
            <section id="existentComments">
                <?
                    $comment_photo = getAccountPhoto($dbh, $existentComment['accountID']);
                ?>
                <div class="commenterInfo"> 
                    <img id="comment_photo" src="../imagens/<?=$comment_photo?>" alt="Comment photo" height="35" width="35">
                    <h4><?=getAccountUsername($dbh, $existentComment['accountID'])?></h4>
                </div>

                <div id="commentBox" class="commentBox">
                <h4><?=$existentComment['commentText']?></h4>
                <? 
                if($accountID == $existentComment['accountID']){ ?>
                    <form action="deleteComment.php" method="post">
                        <input type="hidden" name="commentID" value="<?=$existentComment['commentID']?>">
                        <input class="button" type="submit" name="remove" value="Delete comment">
                    </form>
                <? } ?>
                </div>
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
            <script src="../javascript/script.js" defer></script>
        </div>
<?  }


	function createPost($channelID){ ?>

		<button id="myBtn">Create Post</button>

        <div id="myModal" class="modal">

            <form class="modal-content" action="createNewPost.php" method="post">
                <div class="minidiv"> 
                    <span class="close">&times;</span>
                        <textarea name="title" placeholder="Title" required="required"></textarea>
                        <textarea name="photo" placeholder="Photo"></textarea>
                        <textarea id="descriptions" name="description" placeholder="Description" required="required"></textarea>
                    <input type="hidden" name="channel" value="<?=$channelID?>">
                </div>
                    <button id="enter"> Post </button>
            </form>
        </div>
        <script src="../javascript/script.js" defer></script>
	<? }

    function createChannel($channelID){ ?>

        <button id="createChannel"> Create New Channel </button>

        <div id="myModal" class="modal">

            <form class="modal-content" action="createNewChannel.php" method="post">
                <div class="minidiv">
                <span class="close">&times;</span>
                <label> New Channel </label>
                <textarea name="description" placeholder="Description" required="required" maxlength="15"></textarea>
            </div>
                <button id="enter"> Create </button>
            </form>
        </div>

        <script src="../javascript/script1.js" defer></script>
    <? }
?>