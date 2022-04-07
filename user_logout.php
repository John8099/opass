<?php

session_start();

if (isset($_SESSION['Client_ID'])) 
{
	// session_unset($_SESSION['Client_ID']);
	unset($_SESSION['Client_ID']);

	session_destroy();
}

	header("location: ulogin.php");
?>