<?php
    
    include ('./session.php');
    include ('./register_functions.php');

    $dbh = new PDO('sqlite:database.db');
    $account_id = $_SESSION['accountID'];
    $new_info = $_POST['new_info'];

    if($_POST){
        if(isset($_POST['change_name'])){
            changeName($dbh, $account_id, $new_info);
            header('Location: ./change_profile.php');
        } 
        elseif(isset($_POST['change_username'])){
            changeUsername($dbh, $account_id, $new_info);
        } 
        elseif(isset($_POST['change_email'])){
            changeEmail($dbh, $account_id, $new_info);
        } 
        elseif(isset($_POST['change_age'])){
            changeAge($dbh, $account_id, $new_info);
            header('Location: ./change_profile.php');
        } 
        elseif(isset($_POST['change_city'])){
            changeCity($dbh, $account_id, $new_info);
            header('Location: ./change_profile.php');
        } 
        elseif(isset($_POST['change_job'])){
            changeJob($dbh, $account_id, $new_info);
            header('Location: ./change_profile.php');
        }
    }

    function changeName($dbh, $account_id, $new_info){

        $stmt = $dbh->prepare('UPDATE Account SET personName = ? WHERE accountID = ?');
        $stmt->execute(array($new_info, $account_id));
    }
    function changeUsername($dbh, $account_id, $new_info){

        $availableUsername = checkAvailableUsername($dbh, $new_info);
        if($availableUsername == null){
            
            $stmt = $dbh->prepare('UPDATE Account SET username = ? WHERE accountID = ?');
            $stmt->execute(array($new_info, $account_id));
            header('Location: ./change_profile.php');
        }
        else{

            header('Location: ./change_profile.php?id=1');
        }
    }
    function changeEmail($dbh, $account_id, $new_info){

        $availableEmail = checkAvailableEmail($dbh, $new_info);
        if($availableEmail == null){
            $stmt = $dbh->prepare('UPDATE Account SET email = ? WHERE accountID = ?');
            $stmt->execute(array($new_info, $account_id));
            header('Location: ./change_profile.php');
        }
        else{

            header('Location: ./change_profile.php?id=2');
        }
    }
    function changeAge($dbh, $account_id, $new_info){

        $stmt = $dbh->prepare('UPDATE Account SET age = ? WHERE accountID = ?');
        $stmt->execute(array($new_info, $account_id));
    }
    function changeCity($dbh, $account_id, $new_info){

        $stmt = $dbh->prepare('UPDATE Account SET city = ? WHERE accountID = ?');
        $stmt->execute(array($new_info, $account_id));
    }
    function changeJob($dbh, $account_id, $new_info){

        $stmt = $dbh->prepare('UPDATE Account SET job = ? WHERE accountID = ?');
        $stmt->execute(array($new_info, $account_id));
    }
?>