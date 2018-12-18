<?php
	session_start();
    session_destroy();
    $_SESSION['status']="Unactive";
    header('Location: ./signin.php?id=0');
?>