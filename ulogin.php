<?php
ob_start();
session_start();

include("connection.php");
include("functionSmsEmail.php");

if (isset($_GET["login"])) {
	$uname = $_POST['Username'];
	$pass = $_POST['Password'];

	$query = "SELECT * FROM `user` WHERE Username = '$uname'";
	$result = mysqli_query($connect, $query);

	if (mysqli_num_rows($result) > 0) {
		$user_data = mysqli_fetch_assoc($result);
		$db_password = $user_data['Password'];
		// $verify_password = password_verify($pass, $db_password);
		if (password_verify($pass, $db_password)) {
			$_SESSION['Client_ID'] = $user_data['Client_ID'];
			$_SESSION['isClient'] = true;
			$otp = generateOTP($connect);
			$numbers = getValidNumbers([$user_data['c_number']]);
			if (count($numbers) > 0 && isValidEmail($user_data['c_email'])) {
				$msg = "Your OTP code is: $otp";
				$sendSms = sendSms($numbers[0], $msg);
				$sendEmail = sendEmail($user_data['c_email'], $msg);
				if ($sendSms == 4 && $sendEmail) {
					$_SESSION['smsMaxLimit'] = true;
					$insertOTP = mysqli_query($connect, "INSERT INTO twofa VALUES(NULL, '$user_data[Client_ID]', '$otp')");
					header("location:confirmOTP.php");
				} else if ($sendSms == 0 && $sendEmail) {
					$insertOTP = mysqli_query($connect, "INSERT INTO twofa VALUES(NULL, '$user_data[Client_ID]', '$otp')");
					header("location:confirmOTP.php");
				} else {
					header("location:user_index.php");
				}
			} else {
				header("location:user_index.php");
				exit();
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Log-in/Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="body">
	<img src="5.png" class="logo">
	<div class="container-fluid" id="whole-1" style="background-size: contain;">
		<div class="row" style="padding: 30px;">
			<div class="col-md-3 col-md-offset-3"></div>
			<div class="col-md-6" id="content-1">
				<div class="row" id="innercontent">
					<div class="col-md-2 col-md-offset-6"></div>
					<div class="col-md-4" id="content">
						<h2>Sign In</h2>
					</div>
				</div>
				<div class="row" id="innercontent1">
					<div class="col-md-6" id="logincontent">
						<form class="form-horizontal" action="?login" method="POST">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label" style="color: white;">Username:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputEmail" placeholder="Username" name="Username">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label" style="color: white;">Password:</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="submit" class="btn btn-primary" id="btnlogin" name="submit" value="Login">
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6 row" id="registerbtn">
						<div class="col-md-1 col-md-offset-1"></div>
						<div class="col-md-10" id="btnregister">
							<h4 class="textreg"> Not Registered Yet?</h4>
							<a id="btn" class="btn btn-primary" href="user_registration.php" style="margin-top: 10px;">Register</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>