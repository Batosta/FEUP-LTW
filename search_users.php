<?php

$dbh = new PDO('sqlite:database.db');

$name = $_POST['userName'];

$stmt = $dbh->prepare('SELECT personID FROM Person WHERE personName=?');
$stmt->execute(array($name));

$result = $stmt->fetchAll();

if($result != null){
	foreach ($result as $row) {
  		echo $row['personID'];
  	}
} else{
	echo "We could not find users with that name!";
}

?>