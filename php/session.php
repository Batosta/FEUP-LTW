<?php

session_start();

function currentUser($username, $accountID){

	if($_SESSION['status']="Active"){
    	$_SESSION['username'] = $username;
    	$_SESSION['accountID'] = $accountID;
	}
}

?>