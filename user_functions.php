<?php

    include_once("./encryption.php");

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

    function getUserID($dbh, $username){

        $stmt = $dbh->prepare('SELECT accountID FROM Account WHERE username = ?');
        $stmt->execute(array($username));
        $row = $stmt->fetch();

        return $row['accountID'];
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
<? }


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