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
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>

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
				<em class="fa fa-user-circle-o fa-3x" id="iconprof"></em>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name"><a class="username"><?php echo $user_data['Username'];  ?>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="divider"></div>
	<form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form>
	<ul class="nav menu">
		<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
		<li><a href="appointment.php"><em class="fa fa-calendar">&nbsp;</em> Appointments</a></li>
		<li><a href="messages.php"><em class="fa fa-envelope-o">&nbsp;</em>Messages</a></li>
		<li><a href="notification.php"><em class="fa fa-check">&nbsp;</em>Done Appointments</a></li>
		<li class="active"><a href="attorney.php"><em class="fa fa-clone">&nbsp;</em> Attorneys</a></li>
		<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
	</ul>
	</div>
	<!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Attorney</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color: #14759e;">Attorney</h1>

				<div class="panel panel-default col-md-6" style="margin-left: -9px;">
					<form class="input-group" method="post" action="">
						<input type="text" class="form-control input-md" id="searchplace" name="searchplace" placeholder="Search" style="width: 400px; border-radius: 5px;">
					</form>
				</div>
			</div>
		</div>
		<!--/.row-->
		<?php

		if (isset($_SESSION['message'])) :  ?>


			<div class="alert alert-<?= $_SESSION['msg_type'] ?>">
				<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
				?>

			</div>
		<?php endif ?>
		<div class="row" id="contenttable">
			<form class="form-inline" action="process.php" method="POST" style="margin-top: -25px;">
				<input type="hidden" name="aid" value="<?php echo $attorney_update_id ?>">
				<input type="text" class="form-control" name="fname" id="editform" placeholder="Name" value="<?php echo $fname; ?>" style="width: 120px;height: 35px;">
				<input type="text" class="form-control" name="lname" id="editform" placeholder="Lastname" value="<?php echo $lname; ?>" style="width: 140px;height: 35px;">
				<input type="text" class="form-control" name="age" id="editform" placeholder="Age" value="<?php echo $age; ?>" style="width: 60px;height: 35px;">
				<input type="text" class="form-control" name="email" id="editform" placeholder="Email" value="<?php echo $email; ?>" style="width: 150px;height: 35px;">
				<input type="text" class="form-control" name="address" id="editform" placeholder="Address" value="<?php echo $address; ?>" style="width: 150px;height: 35px;">
				<input type="text" class="form-control" name="sched" id="editform" placeholder="Schedule" value="<?php echo $schedule; ?>" style="width: 120px;height: 35px;">

				<input type="text" class="form-control" name="exp" id="editform" placeholder="Experience" value="<?php echo $exp; ?>" style="width: 100px;height: 35px;">
				<!--<input id="email" name="spec" type="text" placeholder="Specializaion" class="form-control" required>-->
				<input type="text" class="form-control" name="spec" id="editform" placeholder="Specialization_update" value="<?php echo $special; ?>" style="width: 150px;height: 35px;">
				<input type="submit" name="update" class="btn btn-primary" style="height: 35px; width: 75px; font-size: 12px" value="UPDATE">
			</form><br>
		</div>
		<?php
		if (mysqli_num_rows($result)) {
		?>
			<div class="table-responsive">
				<table class=" table borderless" style="box-shadow: 0 3px 10px 0 #a8a6a6" id="results">
					<thead>
						<tr id="thtitle">
							<th id="tabletitle">Name</th>
							<th id="tabletitle">Lastname</th>
							<th id="tabletitle">Age</th>
							<th id="tabletitle">&emsp;&emsp;Email</th>
							<th id="tabletitle">Address</th>
							<th id="tabletitle">Schedule</th>
							<th id="tabletitle">Years of Experience</th>
							<th id="tabletitle">Specialization</th>
							<th id="tabletitle">Actions</th>
						</tr>

						<?php while ($rows = mysqli_fetch_assoc($result)) {
						?>

							<tr>
								<td>
									<?php echo $rows['firstname']; ?>
								</td>

								<td>
									&nbsp;
									<?php echo $rows['lastname']; ?>
								</td>

								<td>
									&nbsp;
									<?php echo $rows['age']; ?>
								</td>
								<td>
									&emsp;&emsp;
									<?php echo $rows['email']; ?>
								</td>
								<td>

									<?php echo $rows['address']; ?>
								</td>
								<td>
									&nbsp;&nbsp;
									<?php echo $rows['Schedule']; ?>
								</td>
								<td>
									&nbsp;&nbsp;
									<?php echo $rows['Y_Exp']; ?>
								</td>
								<td>
									<?php echo $rows['Specialization_name']; ?>
								</td>

								<td>
									<style type="text/css">
										#editmodal:focus {
											outline: none;
										}

										#deletemodal:focus {
											outline: none;
										}
									</style>
									<a style="border: none;" class="edit" id="editmodal" href="attorney.php?edit=<?php echo $rows['attorney_ID']; ?>"><em style="color: blue; cursor: pointer" class="fa fa-pencil-square-o "></em></a>&emsp;

									<a style="border: none;" class="delete" id="deletemodal" href="process.php?delete=<?php echo $rows['attorney_ID']; ?>"><em style="color: red; cursor: pointer" class="fa fa-trash-o"></em></a>
								</td>

							</tr>
						<?php } ?>
					</thead>
				</table>
			</div>
		<?php } ?>
	</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#searchplace').keyup(function() {
				var search = $(this).val();
				$.ajax({
					url: 'search.php',
					method: 'post',
					data: {
						query: search
					},
					success: function(response) {
						$("#results").html(response);
					}

				});
			});
		});
	</script>

</body>

</html>