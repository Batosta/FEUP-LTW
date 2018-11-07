<?php

include_once("../user_functions.php");

echo "Search users";

$user = $_GET['username'];

if(($users = findUser($user)) !== null)
    echo json_encode($users);

else
    echo json_encode("");

?>