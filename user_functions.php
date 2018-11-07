<?php

function getUserID($username){

    global $dbh;

    $stmt = $dbh->prepare('SELECT accountID FROM Account WHERE username = ?');
    $stmt = $dbh->execute(array($username));

    if($row = $stmt->fetch())
        return $row['accountID'];
    
    else 
        return -1;

}

function findUser($username){

    global $dbh;

    $stmt = $dbh->prepare('SELECT username FROM Account');
    $stmt = $dbh->execute(array("$username%"));

    return $stmt->fetchAll();
}

function checkPassword($username, $password) {

    global $dbh;

    $stmt = $dbh->prepare('SELECT * FROM Account WHERE username = ? AND passW = ?');
    $stmt = $dbh->execute(array($username, $password));

    if($stmt->fetch() !== false)
        return getID($username);
    
    else return -1;
}

?>
