<?php
//iya ka log-in nga yudipoga
function check_login($connect){

	if(isset($_SESSION['Client_ID']))
	{

		$id = $_SESSION['Client_ID'];

		$query = "SELECT * from `user` WHERE Client_ID = '$id' ";

		$result = mysqli_query($connect, $query);
		if ($result && mysqli_num_rows($result) > 0) 
		{
			
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;

		}
	}

	header("location: ulogin.php");
	die;
}
//katapusan

//iya ka mag generate ka ID
function random_num($length){

	$text = "";

	if ($length < 4) {
		
		$length = 4;
	}
	$id_length = rand(3, $length);

	for ($i=0; $i < $id_length ; $i++) { 
		
		$text .= rand(3,8);
	}
		return $text;
}

//katapusan



?>