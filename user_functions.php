<?php

session_start();

function setCurrentUser($username){
    $_SESSION['username'] = $username;
}

function getAccountPhoto($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT photo FROM Account WHERE ? = accountID');
        $stmt->execute(array($accountID)); 
        $row = $stmt->fetch();

        return $row['photo'];
    }

    function getAccountUsername($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT username FROM Account WHERE ? = accountID');
        $stmt->execute(array($accountID));
        $row = $stmt->fetch();

        return $row['username'];
    }

    function checkPassword($dbh, $username, $password){

    echo voutestarapasse;
    $stmt = $dbh->prepare('SELECT * FROM Account WHERE username = ? AND passW = ?');
    $stmt->execute(array($username, $password));
    echo testei;
    return $stmt->fetchAll() ? true : false; //returns true if exists
}

function getAccountID($dbh, $username){

    $stmt = $dbh->prepare('SELECT * FROM Account 
        WHERE ? = username');
    $stmt->execute(array($username));
    $row = $stmt->fetch();

    return $row['accountID'];
}

?>
