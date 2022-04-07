<?php

	include("connection.php");
	//number of panding request

	$query2 = "SELECT `request_ID` FROM `request_form` WHERE status = 'pending' AND Attorney_ID = '$_SESSION[attorney_ID]' ORDER BY request_ID";
	$resultsss = mysqli_query($connect, $query2);
	$rowssss = mysqli_num_rows($resultsss);

	//number of cancelled request

	$query3 = "SELECT `request_ID` FROM `request_form` WHERE status = 'cancelled' AND Attorney_ID = '$_SESSION[attorney_ID]' ORDER BY request_ID";
	$resultsss = mysqli_query($connect, $query3);
	$rowsssss = mysqli_num_rows($resultsss);

	//number of accepted requet

	$query4 = "SELECT `request_ID` FROM `request_form` WHERE status = 'accepted' AND Attorney_ID = '$_SESSION[attorney_ID]' ORDER BY request_ID";
	$resultsss = mysqli_query($connect, $query4);
	$rowssssss = mysqli_num_rows($resultsss);


?>