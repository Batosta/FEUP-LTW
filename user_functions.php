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


    function showAllPosts($dbh) {

        $stmt = $dbh->prepare('SELECT * FROM Post');
        $stmt->execute();
        $posts = $stmt->fetchAll();
        foreach ($posts as $post) {
            $post_id = $post['postID'];
            showPostByPostId($dbh, $post_id);
        }
    }
    function showPostByPostId($dbh, $postID){

        $stmt = $dbh->prepare('SELECT * FROM Post WHERE postID = ?');
        $stmt->execute(array($postID));
        $post = $stmt->fetch();

        $post_id = $post['postID'];
        $account_id = $post['accountID']; ?>

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

            <!--test-->


            <!--end test-->

            <section id="comments">
                <? foreach ($comments as $comment) { ?>
                    <article class="comment">
                        <span class="accountID"><?=$comment['accountID']?></span>
                        <p><?=$comment['commentText']?></p>
                <? } ?>
                <form>
                    <h2>Add your comment</h2>
                    <label>
                        <textarea name="text"></textarea>
                    </label>
                    <input type="hidden" name="postID" value="<?=$post_id?>">
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