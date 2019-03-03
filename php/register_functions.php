<?php

	function checkSamePasswords($password, $repassword){

		if($password == $repassword)
			return 1;
		else
			return 0;
	}

	function checkAvailableUsername($dbh, $username){

		$stmt = $dbh->prepare('SELECT accountID FROM Account WHERE username = ?');
        $stmt->execute(array($username));
        $row = $stmt->fetch();

        return $row;
	}

	function checkAvailableEmail($dbh, $email){

		$stmt = $dbh->prepare('SELECT email FROM Account WHERE email = ?');
        $stmt->execute(array($email));
        $row = $stmt->fetch();

        return $row;
	}
?>