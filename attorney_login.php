<?php
session_start();
include("connection.php");
include("functionSmsEmail.php");

if (isset($_GET['login'])) {
	$uname = $_POST['attorney_login_username'];
	$pass = $_POST['attorney_login_password'];

	$query = "SELECT * FROM `attorney` WHERE Attorney_username = '$uname'";
	$result = mysqli_query($connect, $query);

	if ($result && mysqli_num_rows($result) > 0) {
		$user_data = mysqli_fetch_assoc($result);
		$db_password = $user_data['Attorney_password'];
		$verify_password = password_verify($pass, $db_password);
		if ($verify_password == true) {
			$_SESSION['attorney_ID'] = $user_data['attorney_ID'];
			$_SESSION['isAtty'] = true;
			$otp = generateOTP($connect);
			$numbers = getValidNumbers([$user_data['contact']]);
			if (count($numbers) > 0 && isValidEmail($user_data['email'])) {
				$msg = "Your OTP code is: $otp";
				$sendSms = sendSms($numbers[0], $msg);
				$sendEmail = sendEmail($user_data['email'], $msg);
				if ($sendSms == 4 && $sendEmail) {
					$_SESSION['smsMaxLimit'] = true;
					$insertOTP = mysqli_query($connect, "INSERT INTO twofa VALUES(NULL, '$user_data[attorney_ID]', '$otp')");
					header("location:confirmOTP.php");
				} else if ($sendSms == 0 && $sendEmail) {
					$insertOTP = mysqli_query($connect, "INSERT INTO twofa VALUES(NULL, '$user_data[attorney_ID]', '$otp')");
					header("location:confirmOTP.php");
				} else {
					header("location:index.php");
				}
			} else {
				header("location:index.php");
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Attorney login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div>
		<img src="5.png" id="logo">
	</div>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form action="?login" class="login100-form validate-form flex-sb flex-w" method="POST">
					<span class="login100-form-title p-b-51" style="color: #14759e;">
						Attorney Login
					</span>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="text" name="attorney_login_username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="attorney_login_password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div id="reg">
						<span style="font-size: 12px;">No Account Yet?</span>&nbsp;&nbsp;<a href="attorney_registration.php" style="color: #14759e; font-size: 18px; text-decoration: none;">Register Here</a>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>