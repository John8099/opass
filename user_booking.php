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
	<title>OPASS-BOOK</title>
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
				<a href="user_search.php"><input type="sumbit" value="Search" class="btn btn-primary"></a>
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="user_index.php"><em class="fa fa-home">&nbsp;</em> Home</a></li>
			<li><a href="user_inbox.php"><em class="fa fa-envelope">&nbsp;</em> Inbox</a></li>
			<li><a href="user_attorney.php"><em class="fa fa-black-tie">&nbsp;</em> Attorney</a></li>
			<li class="active"><a href="user_booking.php"><em class="fa fa-calendar">&nbsp;</em> Book Appointment</a></li>
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
				<li class="active">Book</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header" style="color: #14759e;">Book Appointment</h3>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default" style="box-shadow: 0 7px 15px 0 #a8a6a6">
					<div class="panel-heading" style="color: #14759e;">
						<strong>Fill Up the Form</strong>
					</div>
					<a href="user_search.php">
						<p class="col-xs-offset-1 col-sm-offset-4 alert bg-info" style="margin-top: 20px; color: white; width: 42.5vh; text-align: center; "><strong>Search for available Attorney's&emsp;</strong><em class="fa fa-search fa-lg"></em></p>
					</a>
					<div class="panel-body">
						<form class="form-horizontal" action="user_process.php" method="post">
							<fieldset>
								<input name="requestid" type="hidden" class="form-control" value=<?php echo random_num(10) ?>>

								<div class="form-group">
									<label class="col-md-3 control-label" for="Attorney" style="color:#14759e;">Attorney: </label>
									<div class="col-md-7">
										<input id="atty" name="attorneyid" type="hidden" value="<?php echo $attorneyID ?>">
										<input id="atty" name="clientid" type="hidden" value="<?php echo $user_data['Client_ID'] ?>">
										<input id="atty" type="text" placeholder="Attorney" class="form-control" disabled required="" style="height: 40px;" value="<?php echo $fname; ?>&nbsp;&nbsp;<?php echo $lname;  ?>">

									</div>
								</div>
								<!-- Name input-->

								<div class="form-group">
									<label class="col-md-3 control-label" for="name" style="color:#14759e;">First Name: </label>
									<div class="col-md-7">
										<input id="fname" name="book_fname" type="text" placeholder="First name" class="form-control" required style="height: 40px;" value=<?php echo $user_data['c_fname']; ?>>
									</div>
								</div>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name" style="color:#14759e;">Last Name: </label>
									<div class="col-md-7">
										<input id="lname" name="book_lname" type="text" placeholder="Last name" class="form-control" required style="height: 40px;" value=<?php echo $user_data['c_lname']; ?>>
									</div>
								</div>
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email" style="color:#14759e;">E-mail: </label>
									<div class="col-md-7">
										<input id="email" name="book_email" type="text" placeholder="Email" class="form-control" required style="height: 40px;">
									</div>
								</div>
								<!-- Address-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email" style="color:#14759e;">Address: </label>
									<div class="col-md-7">
										<input id="address" name="book_address" type="text" placeholder="Address" class="form-control" required style="height: 40px;">
									</div>
								</div>
								<!-- request input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name" style="color:#14759e;">Request: </label>
									<div class="col-md-7">
										<textarea name="book_rqname" type="text" placeholder="Enter Request" class="form-control" required style="height: 40px;"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name" style="color:#14759e;">Request Schedule: </label>
									<div class="col-md-7">
										<input id="datepicker" name="book_date" type="date" placeholder="Request Appointment Date" class="form-control" required style="height: 40px;">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name" style="color:#14759e;">Request Appointment Time: </label>
									<div class="col-md-7">
										<input id="timepicker" name="book_time" type="text" placeholder="Request Appointment time" class="form-control" required style="height: 40px;">
										<input id="status" name="status_id" type="hidden" value="pending">
										<input id="reason" name="reason" type="hidden" value="">
									</div>
								</div>
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right" style="margin-left: -185px;">
										<input style="margin-left: 10px;" type="submit" class="btn btn-primary btn-md pull-right" value="Book" name="submit">
										<button type="reset" class="btn btn-success btn-md pull-right" id="resetbtn"><em class="fa fa-repeat"></em></button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>

			</div><!-- /.col-->
		</div><!-- /.row -->
	</div>
	<!--/.main-->


</body>

</html>