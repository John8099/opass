<?php

include("connection.php");
include("user_function.php");
include("user_process.php");

$user_data = check_login($connect);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OPASS-APPOINTMENT</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	<link href="style.css" rel="stylesheet">


</head>

<body>

	<!--navigation-->
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><strong><span style="color: #14759e;">O</span></strong>PASS&emsp;&emsp;&emsp;&emsp;</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-envelope"></em><span class="label label-danger"></span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Atty. Gonzales</strong>.</a>
										<br /><small class="text-muted">12:27 pm - 25/03/2021</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
										<em class="fa fa-inbox"></em> <strong>All Messages</strong>
									</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-bell"></em><span class="label label-info"></span>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
									<div><em class="fa fa-envelope"></em> 1 New Message
										<span class="pull-right text-muted small">3 mins ago</span>
									</div>
								</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<!--navigation-->

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
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
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $user_data['Username']; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form>
			<div class="form-group">
				<a href="user_search.php" style=""><input type="sumbit" value="Search" class="btn btn-primary"></a>
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="user_index.php"><em class="fa fa-home">&nbsp;</em> Home</a></li>
			<li><a href="user_inbox.php"><em class="fa fa-envelope">&nbsp;</em> Inbox</a></li>
			<li><a href="user_attorney.php"><em class="fa fa-black-tie">&nbsp;</em> Attorney</a></li>
			<li><a href="user_booking.php"><em class="fa fa-calendar">&nbsp;</em> Book Appointment</a></li>
			<li><a href="user_logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="user_index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Appointment</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header" style="color: #14759e;">Appointment</h3>
			</div>
		</div>
		<!--/.row-->

		<div class="row col-md-8 col-md-offset-2">

			<form action="user_process.php" method="post">
				<input type="hidden" name="app_req_id" value="<?php echo $app_track_id ?>">
				<input type="hidden" name="app_admin_id" value="<?php echo $admin_ID ?>">
				<input type="hidden" name="app_atty_id" value="<?php echo $atty_ID ?>">
				<input type="hidden" name="app_client_id" value="<?php echo $client_ID ?> ">
				<input type="hidden" name="app_status_id" value="Done">
				<input id="btn-input" type="text" class="form-control input-md alert-info" name="Cancellation" placeholder="End Appointment" style="cursor: default;" disabled=""><br>
				<p>Wait for Attorney's confirmation to end appointment</p>
				<input type="submit" class="btn btn-primary btn-md" name="doneapp" value="Done">

			</form>

		</div>
		<!--/.row-->

	</div>
	<!--/.main-->


	<div>
		<p>Copyright 2021</p>
	</div>
</body>

</html>