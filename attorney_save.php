<?php
//save attorney

if (isset($_GET['atty_reg'])) {
	$attorneyid = $_POST['id'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$contact = $_POST["contact"];
	$address = $_POST['address'];
	$sched = $_POST['sched'];
	$exp = $_POST['exp'];
	$id = $_POST['special'];
	$username = $_POST['attorney_username'];
	$password = $_POST['attorney_password'];

	$hashed = password_hash($password, PASSWORD_DEFAULT);

	$sql = "INSERT INTO `attorney`(`attorney_ID`, `firstname`, `middlename`, `lastname`, `age`, `email`, contact, `address`, `Schedule`, `Y_Exp`, `Specialization_ID`, `Attorney_username`, `Attorney_password`) VALUES ('$attorneyid','$fname', '$mname','$lname','$age','$email' , '$contact', '$address', '$sched','$exp', '$id','$username','$hashed')";
	$result = mysqli_query($connect, $sql);

	$_SESSION['message'] = "Record has been Saved!";
	$_SESSION['msg_type'] = "success";

	header("location: attorney_login.php");
}

$sql = "SELECT `Specialization_ID`, `Specialization_name` FROM `specialization` ";
$result69 = mysqli_query($connect, $sql);
