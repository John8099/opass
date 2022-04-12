<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include("connection.php");
include("functionSmsEmail.php");
date_default_timezone_set("Asia/Manila");


$id = '';
$todotitle = '';
$edittodo = false;
$fname = '';
$lname = '';
$age = '';
$email = '';
$address = '';
$schedule = '';
$exp = '';
$special = '';

$atty_ID = '';
$Client_ID = '';
$req_ID = '';
$status = '';

//delete record

if (isset($_GET['delete'])) {

	$id = $_GET['delete'];

	$sql = "DELETE FROM `attorney` WHERE attorney_ID = $id";
	$result = mysqli_query($connect, $sql);


	$_SESSION['message'] = "Record has been Deleted!";
	$_SESSION['msg_type'] = "danger";


	header("location: attorney.php");
}

//edit record 
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$result = $connect->query("SELECT * FROM `attorney` INNER JOIN specialization ON attorney.specialization_ID = specialization.specialization_ID WHERE attorney_ID = $id") or die(mysqli_error($connect));
	if (mysqli_num_rows($result) == 1) {
		$row = $result->fetch_array();

		$attorney_update_id = $row['attorney_ID'];
		$fname = $row['firstname'];
		$lname = $row['lastname'];
		$age = $row['age'];
		$email = $row['email'];
		$address = $row['address'];
		$schedule = $row['Schedule'];
		$exp = $row['Y_Exp'];
		$special = $row['Specialization_name'];
	}
}

//update attorney

if (isset($_POST['update'])) {
	$id = mysqli_real_escape_string($connect, $_POST['aid']);
	$fname =  mysqli_real_escape_string($connect, $_POST['fname']);
	$lname =  mysqli_real_escape_string($connect, $_POST['lname']);
	$age =  mysqli_real_escape_string($connect, $_POST['age']);
	$email =  mysqli_real_escape_string($connect, $_POST['email']);
	$contact =  mysqli_real_escape_string($connect, $_POST['contact']);
	$address =  mysqli_real_escape_string($connect, $_POST['address']);
	$schedule =  mysqli_real_escape_string($connect, $_POST['sched']);
	$exp =  mysqli_real_escape_string($connect, $_POST['exp']);
	$special =  mysqli_real_escape_string($connect, $_POST['spec']);

	$sql = "UPDATE `attorney` SET `firstname`='$fname',`lastname`='$lname',`age`='$age',`email`='$email', contact='$contact', `address`='$address',`Schedule`='$schedule',`Y_Exp` = '$exp' WHERE attorney_ID = $id";

	$result = mysqli_query($connect, $sql);

	if ($result) {

		$_SESSION['message'] = "Record has been Updated!";
		$_SESSION['msg_type'] = "success";
		header("location:attorney.php");
	} else {
		echo "<script>
						alert('Error');
					  </script>
					 ";
	}
}

//specialized
if (isset($_POST['save'])) {

	$specialize_id = $_POST['specialize_id'];
	$specialize = $_POST['specialize'];
	$desc = $_POST['description'];

	$sql = "INSERT INTO `specialization`(`Specialization_ID`, `Specialization_name`, `spec_description`) VALUES ('$specialize_id ', '$specialize' ,'$desc')";
	$result = mysqli_query($connect, $sql);

	$_SESSION['message'] = "Specialization Saved!";
	$_SESSION['msg_type'] = "success";

	header("location: index.php");
}

//delete todo
if (isset($_GET['delete_todo'])) {

	$id = $_GET['delete_todo'];

	$sql = "DELETE FROM `todo` WHERE todo_ID = $id";
	$result = mysqli_query($connect, $sql);


	$_SESSION['message'] = "Record has been Deleted!";
	$_SESSION['msg_type'] = "danger";


	header("location: index.php");
}
//update todo 
if (isset($_GET['edit_todo'])) {
	$id = $_GET['edit_todo'];
	$edittodo = true;
	$result = $connect->query("SELECT * FROM `todo` WHERE todo_ID = $id") or die(mysqli_error($connect));
	if (mysqli_num_rows($result) == 1) {
		$row = $result->fetch_array();

		$todoid = $row['todo_ID'];
		$todotitle = $row['todotitle'];
	}
}
//delete appointment
if (isset($_GET['deleteapp'])) {
	$id = $_GET['deleteapp'];
	$sql = "DELETE FROM `request_form` WHERE Request_ID = $id";
	$result = mysqli_query($connect, $sql);
	$_SESSION['message'] = "Appointment Deleted!";
	$_SESSION['msg_type'] = "danger";


	header("location:appointment.php");
}
///cancel
if (isset($_GET['cancel'])) {
	$id = $_GET['cancel'];
	$result =  $connect->query("SELECT * FROM `request_form` INNER JOIN attorney ON request_form.Attorney_ID = attorney.attorney_ID INNER JOIN user ON request_form.Client_ID = user.Client_ID WHERE Request_ID = $id") or die(mysqli_error($connect));
	if (mysqli_num_rows($result) == 1) {
		$rows = $result->fetch_array();

		$req_ID = $rows['Request_ID'];
		$atty_ID = $rows['Attorney_ID'];
		$Client_ID = $rows['Client_ID'];
	}
}
//cancelled
if (isset($_POST['sendbtn'])) {

	$admin_ID =  mysqli_real_escape_string($connect, $_POST['app_admin_id']);
	$client_id =  mysqli_real_escape_string($connect, $_POST['app_client_id']);
	$req_ID =  mysqli_real_escape_string($connect, $_POST['app_req_id']);
	$req_status =   mysqli_real_escape_string($connect, $_POST['app_status_id']);
	$reason =  mysqli_real_escape_string($connect, $_POST['Cancellation']);

	$sql = "UPDATE `request_form` SET `Attorney_ID`='$admin_ID',`Client_ID`='$client_id',`status`='$req_status',`Cancellation_reason`='$reason' WHERE Request_ID = $req_ID";

	$result = mysqli_query($connect, $sql);

	if ($result) {
		$_SESSION['message'] = "Appointment Cancelled!";
		$_SESSION['msg_type'] = "danger";

		$message = "Your Appointment was cancelled";
		$request_q = mysqli_query($connect, "SELECT * FROM request_form WHERE Request_ID='$req_ID'");
		if (mysqli_num_rows($request_q) == 1 && mysqli_num_rows($request_q) != 0) {
			$request_f = mysqli_fetch_object($request_q);

			if ($request_f->Appointment_date) {
				preg_match_all('!\d+!', $request_f->Appointment_Time, $matches);
				if ($matches[0]) {
					$hour = (int)$matches[0][0];
					$minute = count($matches[0]) > 1 ? $matches[0][1] : "00";
					if (strpos($request_f->Appointment_Time, "am")) {
						$hour += 12;
					}
					$time = date("h:i A", strtotime("$hour:$minute"));
					$date = date("F d, Y", strtotime($request_f->Appointment_date));
					$date = ucwords($date) . " $time";
				} else {
					$date = ucwords(date("F d, Y", strtotime($request_f->Appointment_date)));
				}
				$message = "Your Appointment on $request_f->Appointment_date $request_f->Appointment_Time was cancelled";
			}

			if ($request_f->email != "" && isValidEmail($request_f->email)) {
				sendEmail($request_f->email, $message);
			} else {
				while ($email = mysqli_fetch_object($request_f)) {
					sendEmail($email, $message);
				}
			}
		}

		$client_q = mysqli_query($connect, "SELECT c_number, Client_ID FROM user WHERE Client_ID='$client_id'");
		echo mysqli_num_rows($client_q) > 0;
		if (mysqli_num_rows($client_q) > 0) {
			$client_f = mysqli_fetch_object($client_q);
			if (preg_replace('/\s+/', "", $client_f->c_number) !== "") {
				$numbers = getValidNumbers([$client_f->c_number]);
				if (count($numbers) == 1 && count($numbers) != 0) {
					sendSms($numbers[0], $message);
				} else if (count($numbers) > 1 && count($numbers) !== 0) {
					foreach ($numbers as $number) {
						sendSms($number, $message);
					}
				}
			}
		}

		header("location:appointment.php");
	} else {
		echo $sql;
	}
}
//accept
if (isset($_GET['accept'])) {
	$id = $_GET['accept'];
	$result =  $connect->query("SELECT * FROM `request_form` INNER JOIN attorney ON request_form.Attorney_ID = attorney.attorney_ID INNER JOIN user ON request_form.Client_ID = user.Client_ID WHERE Request_ID = $id") or die(mysqli_error($connect));
	if (mysqli_num_rows($result) == 1) {
		$rows = $result->fetch_array();

		$req_ID = $rows['Request_ID'];
		$atty_ID = $rows['Attorney_ID'];
		$Client_ID = $rows['Client_ID'];
	}
}
//accept appointment
if (isset($_POST['acceptapp'])) {

	$admin_ID =  mysqli_real_escape_string($connect, $_POST['app_admin_id']);
	$client_id =  mysqli_real_escape_string($connect, $_POST['app_client_id']);
	$req_ID =  mysqli_real_escape_string($connect, $_POST['app_req_id']);
	$req_status =   mysqli_real_escape_string($connect, $_POST['app_status_id']);

	date_default_timezone_set('Asia/Manila');
	$date_accepted = date('Y-m-d H:i:s');

	// $reason =  mysqli_real_escape_string($connect, $_POST['Cancellation']);

	$sql = "UPDATE `request_form` SET `Client_ID`='$client_id',`attorney_ID`='$admin_ID',`status`='$req_status', `date_accepted`='$date_accepted' WHERE Request_ID = $req_ID";

	$result = mysqli_query($connect, $sql);

	if ($result) {
		$_SESSION['message'] = "Appointment Accepted!";
		$_SESSION['msg_type'] = "success";

		$message = "Your Appointment was accepted";
		$request_q = mysqli_query($connect, "SELECT * FROM request_form WHERE Request_ID='$req_ID'");
		if (mysqli_num_rows($request_q) == 1 && mysqli_num_rows($request_q) != 0) {
			$request_f = mysqli_fetch_object($request_q);

			if ($request_f->Appointment_date) {
				preg_match_all('!\d+!', $request_f->Appointment_Time, $matches);
				if ($matches[0]) {
					$hour = (int)$matches[0][0];
					$minute = count($matches[0]) > 1 ? $matches[0][1] : "00";
					if (strpos($request_f->Appointment_Time, "am")) {
						$hour += 12;
					}
					$time = date("h:i A", strtotime("$hour:$minute"));
					$date = date("F d, Y", strtotime($request_f->Appointment_date));
					$date = ucwords($date) . " $time";
				} else {
					$date = ucwords(date("F d, Y", strtotime($request_f->Appointment_date)));
				}
				$message = "Your Appointment on $request_f->Appointment_date $request_f->Appointment_Time was accepted";
			}

			if ($request_f->email != "" && isValidEmail($request_f->email)) {
				sendEmail($request_f->email, $message);
			} else {
				while ($email = mysqli_fetch_object($request_f)) {
					sendEmail($email, $message);
				}
			}
		}

		$client_q = mysqli_query($connect, "SELECT c_number, Client_ID FROM user WHERE Client_ID='$client_id'");
		echo mysqli_num_rows($client_q) > 0;
		if (mysqli_num_rows($client_q) > 0) {
			$client_f = mysqli_fetch_object($client_q);
			if (preg_replace('/\s+/', "", $client_f->c_number) !== "") {
				$numbers = getValidNumbers([$client_f->c_number]);
				if (count($numbers) == 1 && count($numbers) != 0) {
					sendSms($numbers[0], $message);
				} else if (count($numbers) > 1 && count($numbers) !== 0) {
					foreach ($numbers as $number) {
						sendSms($number, $message);
					}
				}
			}
		}

		header("location:appointment.php");
	} else {
		echo "<script>
					alert('Error');
				  </script>
				 ";
	}
}

//done
if (isset($_GET['done'])) {
	$id = $_GET['done'];
	$result =  $connect->query("SELECT * FROM `request_form` INNER JOIN attorney ON request_form.Attorney_ID = attorney.attorney_ID INNER JOIN user ON request_form.Client_ID = user.Client_ID WHERE Request_ID = $id") or die(mysqli_error($connect));
	if (mysqli_num_rows($result) == 1) {
		$rows = $result->fetch_array();

		$req_ID = $rows['Request_ID'];
		$atty_ID = $rows['Attorney_ID'];
		$Client_ID = $rows['Client_ID'];
	}
}
//done appointment
if (isset($_POST['doneapp'])) {

	$admin_ID =  mysqli_real_escape_string($connect, $_POST['app_admin_id']);
	$client_id =  mysqli_real_escape_string($connect, $_POST['app_client_id']);
	$req_ID =  mysqli_real_escape_string($connect, $_POST['app_req_id']);
	$req_status =   mysqli_real_escape_string($connect, $_POST['app_status_id']);

	date_default_timezone_set('Asia/Manila');
	$date_ended = date('Y-m-d H:i:s');


	$sql = "UPDATE `request_form` SET `Client_ID`='$client_id',`attorney_ID`='$admin_ID',`status`='$req_status',`date_ended`='$date_ended' WHERE Request_ID = $req_ID";

	$result = mysqli_query($connect, $sql);

	if ($result) {
		$_SESSION['message'] = "Appointment Done!";
		$_SESSION['msg_type'] = "success";
		header("location:appointment.php");
	} else {
		echo "<script>
					alert('Error');
				  </script>
				 ";
	}
}

//vieiw view

$sql = "SELECT * FROM `attorney` INNER JOIN specialization ON attorney.specialization_ID = specialization.specialization_ID";
$result = mysqli_query($connect, $sql);

$sqli = " SELECT * FROM `todo` WHERE Attorney_id = '$_SESSION[attorney_ID]' ";
$result1 = mysqli_query($connect, $sqli);

//view appointment
$query = "SELECT * FROM `request_form` INNER JOIN user ON request_form.Client_ID = user.Client_ID WHERE request_form.Attorney_ID = $_SESSION[attorney_ID] and `status` != 'done'";
$queryresult = mysqli_query($connect, $query);

