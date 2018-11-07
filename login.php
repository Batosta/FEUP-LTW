<?php

include_once("../user_functions.php");
include_once("../session.php");


    if($userID = checkPassword($_POST['username'], $_POST['passW']) != -1) 
        currentUser($_POST['username'], $userID);
    
    else
        $_SESSION['ERROR'] = 'Incorrect password or username';

?>