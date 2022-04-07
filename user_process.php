<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("connection.php");


	$fname = '';
	$lname = '';

	$status = '';
	$clientid = '';
	$requestID = '';
	$attyid = '';
	$firstname = '';   
	$lastname =' '; 
	$email = ''; 
	$address = ''; 
	$rqname = ''; 
	$date =''; 
	$time ='';
	$app_track_id = '';
	$admin_ID ='';
	$atty_ID ='';
	$client_ID ='';

//display attorney on user

if (isset($_GET['bookatt'])) {
		$id = $_GET['bookatt'];
		$result = $connect->query("SELECT * FROM `attorney` INNER JOIN specialization ON attorney.specialization_ID = specialization.specialization_ID WHERE attorney_ID = $id") or die(mysqli_error($connect));
	if (mysqli_num_rows($result)==1) {
		$row = $result->fetch_array();

		$attorneyID = $row['attorney_ID'];
		$fname = $row['firstname'];
		$lname = $row['lastname'];

		}
	}


//display attorney_details

if (isset($_GET['details'])) {
		$id = $_GET['details'];
		$result = $connect->query("SELECT * FROM `attorney` INNER JOIN specialization ON attorney.specialization_ID = specialization.specialization_ID WHERE attorney_ID = $id") or die(mysqli_error($connect));
	if (mysqli_num_rows($result)==1) {
		$row =$result->fetch_array();

		$attorneyID = $row['attorney_ID'];
		$Spec = $row['Specialization_name'];
		$Age = $row['age'];

		}
	}


//display data

if (isset($_GET['book'])) {
		$id = $_GET['book'];
		$result = $connect->query("SELECT * FROM `attorney` INNER JOIN specialization ON attorney.specialization_ID = specialization.specialization_ID WHERE attorney_ID = $id") or die(mysqli_error($connect));
	if (mysqli_num_rows($result)==1) {
		$row =$result->fetch_array();

		$attorneyID = $row['attorney_ID'];
		$fname = $row['firstname'];
		$lname = $row['lastname'];

		}
	}

//save request
if (isset($_POST['submit'])) {

	$clientid =  mysqli_real_escape_string($connect,$_POST['clientid']);
	$requestID =  mysqli_real_escape_string($connect,$_POST['requestid']);
	$attyid =  mysqli_real_escape_string($connect,$_POST['attorneyid']);
	$status =  mysqli_real_escape_string($connect,$_POST['status_id']);
	$firstname =  mysqli_real_escape_string($connect,$_POST['book_fname']);
	$lastname =  mysqli_real_escape_string($connect,$_POST['book_lname']);
	$email =  mysqli_real_escape_string($connect,$_POST['book_email']);
	$address =  mysqli_real_escape_string($connect,$_POST['book_address']);
	$rqname =  mysqli_real_escape_string($connect,$_POST['book_rqname']);
	$date =  mysqli_real_escape_string($connect,$_POST['book_date']);
	$time =  mysqli_real_escape_string($connect,$_POST['book_time']);
	
	$sql = "INSERT INTO `request_form`(`Request_ID`, `Attorney_ID`, `Client_ID`,`fname`, `lname`, `email`, `address`, `request_name`, `Appointment_date`,`Appointment_Time`,`status`) VALUES ('$requestID','$attyid','$clientid','$firstname','$lastname','$email','$address','$rqname','$date','$time','$status')";

	$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if ($result) {
		header("location: user_booking.php");
	}else{
		echo 'error';
	}
}

//display apointment tracking

if (isset($_GET['track'])) {
		$id = $_GET['track'];
		$result = $connect->query("SELECT * FROM `request_form`  WHERE Request_ID = $id") or die(mysqli_error($connect));
	if (mysqli_num_rows($result)==1) {
		$row =$result->fetch_array();

		$app_track_id = $row['Request_ID'];
		$atty_ID = $row['Attorney_ID'];
		$client_ID = $row['Client_ID'];
		
		}
	}

if (isset($_POST['doneapp'])) {

	$atty_id =  mysqli_real_escape_string($connect,$_POST['app_atty_id']);	
	$client_id =  mysqli_real_escape_string($connect,$_POST['app_client_id']);	
	$req_ID =  mysqli_real_escape_string($connect,$_POST['app_req_id']);		
	$req_status =   mysqli_real_escape_string($connect,$_POST['app_status_id']);		
	$reason =  mysqli_real_escape_string($connect,$_POST['Cancellation']);

		$sql = "UPDATE `request_form` SET `Attorney_ID`='$atty_id',`Client_ID`='$client_id',`user_status`='$req_status',`Cancellation_reason`='$reason' WHERE Request_ID = $req_ID";

		$result = mysqli_query($connect, $sql);

		if ($result) {

			$_SESSION['message'] = "Appointment Accepted!";
			$_SESSION['msg_type'] = "success";
			header("location:user_index.php");
		}else{
			echo "<script>
					alert('Error');
				  </script>
				 ";


		}

	}



 //////user attorney view
	
 $sql = "SELECT * FROM `attorney` INNER JOIN specialization ON attorney.specialization_ID = specialization.specialization_ID ORDER BY RAND() LIMIT 3";
 $query = mysqli_query($connect,$sql);

//View Cancelled
 $sqlquery = "SELECT * FROM `request_form` INNER JOIN attorney ON request_form.attorney_ID = attorney.attorney_ID WHERE status = 'cancelled' AND Client_ID = $_SESSION[Client_ID] ";
 $query1 = mysqli_query($connect,$sqlquery);
//View Pending
 $query32 = "SELECT * FROM `request_form` INNER JOIN attorney ON request_form.attorney_ID = attorney.attorney_ID WHERE status = 'pending' AND Client_ID = $_SESSION[Client_ID] ";
 $query2 = mysqli_query($connect,$query32);
//View Accepted
 $query69 = "SELECT * FROM `request_form` INNER JOIN attorney ON request_form.attorney_ID = attorney.attorney_ID WHERE status = 'accepted' AND Client_ID = $_SESSION[Client_ID] ";
 $query3 = mysqli_query($connect,$query69);
 //View Done
 $query420 = "SELECT * FROM `request_form` INNER JOIN attorney ON request_form.attorney_ID = attorney.attorney_ID WHERE status = 'Done' AND Client_ID = $_SESSION[Client_ID] ";
 $query4 = mysqli_query($connect,$query420);
