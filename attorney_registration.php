<?php
	include("connection.php");
	include("function.php");
	include("attorney_save.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Attorney Registration</title>
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
				<form action="?atty_reg" class="login100-form validate-form flex-sb flex-w" method="POST">
					<span class="login100-form-title p-b-51" style="color: #14759e;">
						Attorney Registration
					</span>
					<input name="id" type="hidden" class="form-control" value = <?php echo random_num(12) ?> >

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Firstname is required">
						<input class="input100" type="text" name="fname" placeholder="Firstname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Middlename is required">
						<input class="input100" type="text" name="mname" placeholder="Middlename">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Lastname is required">
						<input class="input100" type="text" name="lname" placeholder="Lastname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Age is required">
						<input class="input100" type="text" name="age" placeholder="Age">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Contact number is required">
						<input class="input100" type="text" name="contact" placeholder="Contact number">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Address is required">
						<input class="input100" type="text" name="address" placeholder="Address">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Schedule is required">
						<input class="input100" type="text" name="sched" placeholder="Schedule">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Experience is required">
						<input class="input100" type="text" name="exp" placeholder="Years of Experience">
						<span class="focus-input100"></span>
					</div>

						<?php
							if (mysqli_num_rows($result69) ) 
							{
								
						?>
									<div class="wrap-input100 validate-input m-b-16">
									<select name="special" class="input100" style="height: 40px; border: none;">
										<?php
												while ($rows = mysqli_fetch_assoc($result69)) {
													$id = $rows['Specialization_ID'];
													$spec = $rows['Specialization_name'];
													echo "<option value = '$id'>$spec</option>";
												}
										?>
									</select>
								</div>

							<?php } ?>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="attorney_username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="attorney_password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Re Enter Password">
						<input class="input100" type="password" name="attorney_access" placeholder="Re-Enter Password Code">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<input class="login100-form-btn" type="submit" name="attorney_save" value="Register" style="cursor: pointer">
					</div>

					<div id="reg">
						<span style="font-size: 12px;">Have an Account?</span>&nbsp;&nbsp;<a href="attorney_login.php" style="color: #14759e; font-size: 18px; text-decoration: none;">Login Here</a>
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