<?php
        
include ('./session.php');
include_once('utilities_functions.php');

$dbh = new PDO('sqlite:database.db');
$account_id = $_SESSION['accountID'];
    
$target_dir = "/imagens";
$originalName = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($originalName,PATHINFO_EXTENSION);
$target_file = $target_dir . $account_id . "." . $imageFileType ;
$uploadOk = 1;
     
//Overide previous picture
if (file_exists($target_file)) {
    unlink($target_file);
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $_SESSION['ERROR'] =  "Error uploading photo";

  // if everything is ok, try to upload file
  } else {
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    if(updateUserPhoto($dbh, $account_id, $account_id . "." . $imageFileType) == null){
       $_SESSION['ERROR'] = "Error uploading photo";
    }
  } else {
        $_SESSION['ERROR'] =  "Error uploading photo";
    }
  }

  header("Location: ./change_profile.php");
?>