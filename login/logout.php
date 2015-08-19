<?php
session_start();

if(!(isset($_SESSION['username']) && $_SESSION['username'] = true))
{
	unset($_SESSION['username']);
	session_unset();
	session_destroy();
        echo "<script>window.location.href='./index.html';</script>";
	exit;
}

?>
