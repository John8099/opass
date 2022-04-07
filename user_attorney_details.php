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
	<title>OPASS-DETAILS</title>
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
			<li class="active"><a href="user_attorney.php"><em class="fa fa-black-tie">&nbsp;</em> Attorney</a></li>
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
				<li class="active">Attorney Details</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header" style="color: #14759e;">Attorney Details</h3>
			</div>
		</div>
		<!--/.row-->

		<div class="row panel panel-blue col-md-11 col-xs-11" style="margin: 10px;"><br>
			<div class="holder col-md-4">
				<img src="<?php echo $user_data['profile'] ?>"  style=" height: 280px; width: 245px;">
			</div>
			<div class="col-md-4">
				<h4 class="panel panel-teal" style="color: white; padding: 10px;">&emsp;Atty.&nbsp;<?php echo $row['firstname']; ?> &nbsp;<?php echo $row['lastname']; ?></h4>
				<p style="font-size: 11px;">Service Available Every: <span class="panel panel-teal" style="padding: 5px;"> <?php echo $row['Schedule']; ?> </span></p>
				<h4 style="color:White;  margin-left: 15px; ">&nbsp;&nbsp;Years Of Experience:</h4>
				<p style="color: white;  margin-left: 15px; padding: 10px 0 10px 10px;">&nbsp;&nbsp;<?php echo $row['Y_Exp']; ?></p>
				<h4 style="color:White;  margin-left: 15px;">&nbsp;&nbsp;Specializes in:</h4>
				<p style="color: white;  margin-left: 15px; padding: 10px 0 10px 10px;">&nbsp;&nbsp;<?php echo $row['Specialization_name']; ?></p>
				<p class="panel panel-teal" style="color: white; padding: 10px 0 10px 10px;">&nbsp;&nbsp;<?php echo $row['spec_description']; ?></p>
			</div>
		</div>
		<!--/.row-->
		<div class="col-md-4" style="margin-bottom: 50px;"><a href="user_attorney.php" class="btn btn-info">Go Back<br></a></div>
	</div>
	<!--/.main-->



</body>

</html>