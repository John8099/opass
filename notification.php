<?php

include("connection.php");
include("process.php");
include("function.php");

$user_data = check_login($connect);


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OPASS</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<img src="5.png" class="dashlogo">
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<br>
		<div class="profile-userpic">
			<a href="my-profile.php">
				<?php
				if ($user_data['profile'] == "") {
				?>
					<em class="fa fa-user-circle-o fa-3x" id="iconprof"></em>
				<?php
				} else {
				?>
					<img id="prev_img" src="<?php echo $user_data['profile'] ?>" style="border: 1px solid #808080;" />
				<?php
				}
				?>
			</a>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><a class="username"><?php echo $user_data['firstname']; ?></a>
				</div>
			</div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="appointment.php"><em class="fa fa-calendar">&nbsp;</em> Appointments</a></li>
			<li><a href="messages.php"><em class="fa fa-envelope-o">&nbsp;</em>Messages</a></li>
			<li class="active"><a href="notification.php"><em class="fa fa-check">&nbsp;</em>Done Appointments</a></li>
			<li><a href="attorney_logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Done Appointments</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color: #14759e;">Done Appointments</h1>
			</div>
			<div class="row table-responsive" style="padding: 20px;">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="color: #14759e;" class="col-md-2">
								Client
							</th>
							<th style="color: #14759e;" class="col-md-2">
								Request&emsp;
							</th>
							<th style="color: #14759e;" class="col-md-2">
								Appointment Date
							</th>
							<th style="color: #14759e;" class="col-md-2">
								Appointment Time
							</th>

						</tr>
					</thead>
					<?php
					$doneAppoint = mysqli_query($connect, "SELECT * FROM `request_form` INNER JOIN user ON request_form.Client_ID = user.Client_ID WHERE request_form.Attorney_ID = $_SESSION[attorney_ID] and `status`='done'");
					while ($rows = mysqli_fetch_assoc($doneAppoint)) {
					?>
						<tr>

							<td>
								<p style="font-size: 13px; padding-top: 5px;"><?php echo $rows['c_fname']; ?> &nbsp; <?php echo $rows['c_lname']; ?></p>
							</td>

							<td>
								<p style="font-size: 12px; padding-top: 5px;"> <?php echo $rows['request_name']; ?></p>
							</td>

							<td>
								<p style="font-size: 13px; padding-top: 5px;">&emsp;&emsp;<?php echo $rows['Appointment_date']; ?></p>
							</td>

							<td>
								<p style="font-size: 13px; padding-top: 5px;">&emsp;&emsp;<?php echo $rows['Appointment_Time']; ?></p>
							</td>

						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<!--/.row-->
	</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function() {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc"
			});
		};
	</script>


</body>

</html>