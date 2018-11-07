<?php

session_start();

function currentUser($username, $accountID){

    $_SESSION['username'] = $username;
    $_SESSION['accountID'] = $accountID;
}

?>