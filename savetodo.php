<?php
	session_start();
	include("connection.php");

	if (isset($_POST['btn1'])) {

		$attorney_ID = $_POST['id'];
		$title = $_POST['title'];

		$sql = "INSERT INTO `todo`(`todo_ID`, `attorney_ID`, `todotitle`) VALUES ( '','$attorney_ID','$title')";
		$result1 = mysqli_query($connect, $sql);
	}

	header("location: index.php");


//update todo

	if (isset($_POST['update'])) {
		
		$todoid = $_POST['todo_id'];
		$updatetodo = $_POST['title'];

		$sql = "UPDATE `todo` SET `todotitle`= '$updatetodo' WHERE todo_ID = '$todoid' ";
		$result = mysqli_query($connect, $sql);


		if ($result) {
			$_SESSION['message'] = "Todo has been Updated!";
			$_SESSION['msg_type'] = "success";
			header("location: index.php");
		}else{
			echo $sql;
		}

	}
?>