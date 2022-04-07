<?php

session_start();

if (isset($_SESSION['attorney_ID'])) 
{
	// session_unset($_SESSION['attorney_ID']);
	unset($_SESSION['attorney_ID']);

	session_destroy();
}

	header("location: attorney_login.php");
?>