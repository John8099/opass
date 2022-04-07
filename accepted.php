<?php

include("connection.php");
include("function.php");
include("process.php");

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
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><strong><span style="color: #14759e;">O</span></strong>PASS&emsp;&emsp;&emsp;&emsp;</a>
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
			<li class="active"><a href="appointment.php"><em class="fa fa-calendar">&nbsp;</em> Appointments</a></li>
			<li><a href="messages.php"><em class="fa fa-envelope-o">&nbsp;</em>Messages</a></li>
			<li><a href="notification.php"><em class="fa fa-bell-o">&nbsp;</em>Done Appointments</a></li>
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
				<li class="active">Accept</li>
			</ol>
		</div>
		<!--row-->
		<div class="row">

		</div>
		<!--/.row--><br><br><br><br><br><br><br><br><br><br><br>
		<form class="input-group col-md-8 col-md-offset-2" action="process.php" method="post">
			<input type="hidden" name="app_req_id" class="form-control input-md col-md-3" value="<?php echo $req_ID ?>">
			<input type="hidden" name="app_admin_id" value=<?php echo $_SESSION['attorney_ID']; ?> class="form-control input-md col-md-2">
			<input type="hidden" name="app_client_id" class="form-control input-md col-md-3" value="<?php echo $Client_ID ?>">
			<input type="hidden" name="app_status_id" class="form-control input-md col-md-3" value="accepted">
			<input id="btn-input" type="text" class="form-control input-md alert-info" name="Cancellation" placeholder="Confirm Appointment" style="cursor: default;" disabled="">
			<span class="input-group-btn">
				<input type="submit" class="btn btn-success btn-md" name="acceptapp" value="Confirm">
			</span>
		</form>
	</div>


</body>

</html>