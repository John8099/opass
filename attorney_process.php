<?php 
	session_start();
	include("connection.php");
	
	//delete appointment
	if (isset($_GET['deleteapp'])) {
		$id = $_GET['deleteapp'];
		$sql = "DELETE FROM `request_form` WHERE Request_ID = $id";
		$result = mysqli_query($connect , $sql);
		$_SESSION['message'] = "Appointment Deleted!";
		$_SESSION['msg_type'] = "danger";


		header("location:attorney_index.php");
	}
///cancel
if (isset($_GET['cancel'])) {
	$id = $_GET['cancel'];
	$result =  $connect->query("SELECT * FROM `request_form` INNER JOIN attorney ON request_form.Attorney_ID = attorney.attorney_ID INNER JOIN user ON request_form.Client_ID = user.Client_ID WHERE Request_ID = $id") or die($connect->error());
	if (mysqli_num_rows($result)==1) {
		$rows =$result->fetch_array();

		$req_ID = $rows['Request_ID'];
		$atty_ID = $rows['Attorney_ID'];
		$Client_ID = $rows['Client_ID'];

	}	
}
//cancelled
if (isset($_POST['sendbtn'])) 
{

	$admin_ID = $_POST['app_admin_id'];	
	$client_id = $_POST['app_client_id'];	
	$req_ID = $_POST['app_req_id'];		
	$req_status =  $_POST['app_status_id'];		
	$reason = $_POST['Cancellation'];

		$sql = "UPDATE `request_form` SET `Client_ID`='$client_id',`attorney_login_id`='$admin_ID',`status`='$req_status',`Cancellation_reason`='$reason' WHERE Request_ID = $req_ID";

		$result = mysqli_query($connect, $sql);

		if ($result) 
		{
			$_SESSION['message'] = "Appointment Cancelled!";
			$_SESSION['msg_type'] = "danger";
			header("location:attorney_index.php");
		}else
			{
				echo $sql;
			}

}
//accept
if (isset($_GET['accept'])) {
	$id = $_GET['accept'];
	$result =  $connect->query("SELECT * FROM `request_form` INNER JOIN attorney ON request_form.Attorney_ID = attorney.attorney_ID INNER JOIN user ON request_form.Client_ID = user.Client_ID WHERE Request_ID = $id") or die($connect->error());
	if (mysqli_num_rows($result)==1) {
		$rows =$result->fetch_array();

		$req_ID = $rows['Request_ID'];
		$atty_ID = $rows['Attorney_ID'];
		$Client_ID = $rows['Client_ID'];

	}	
}
//accept appointment
if (isset($_POST['acceptapp'])) {

	$admin_ID = $_POST['app_admin_id'];	
	$client_id = $_POST['app_client_id'];	
	$req_ID = $_POST['app_req_id'];		
	$req_status =  $_POST['app_status_id'];	

	date_default_timezone_set('Asia/Manila');
	$date_accepted = date('Y-m-d H:i:s');	
	
	$reason = $_POST['Cancellation'];

		$sql = "UPDATE `request_form` SET `Client_ID`='$client_id',`attorney_login_id`='$admin_ID',`status`='$req_status', `date_accepted`='$date_accepted', `Cancellation_reason`='$reason' WHERE Request_ID = $req_ID";

		$result = mysqli_query($connect, $sql);

		if ($result) {
			$_SESSION['message'] = "Appointment Accepted!";
			$_SESSION['msg_type'] = "success";
			header("location:attorney_index.php");
		}else
		{
			echo "<script>
					alert('Error');
				  </script>
				 ";
		}
	}
?>