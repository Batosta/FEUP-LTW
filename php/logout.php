<?php
	session_start();
    session_destroy();
    $_SESSION['status']="Unactive";
    header('Location: ../index.html');
?>