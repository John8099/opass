<?php
include("connection.php");
include("process.php");
include("counter.php");
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
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="appointment.php"><em class="fa fa-calendar">&nbsp;</em> Appointments</a></li>
			<li><a href="messages.php"><em class="fa fa-envelope-o">&nbsp;</em>Messages</a></li>
			<li><a href="notification.php"><em class="fa fa-check">&nbsp;</em>Done Appointments</a></li>
			<li><a href="attorney_logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li>
					<a href="#">
						<em class="fa fa-home"></em>
					</a>
				</li>

				<li class="active">Dashboard</li>
				<?php

				?>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color: #14759e;">Dashboard</h1>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
        <?php #print_r($_SESSION) ?>
			<div class="panel panel-container col-md-10 col-md-offset-1" style="box-shadow: 0 4px 20px 0 #a8a6a6;">
				<div class="row">
					<div class="col-xs-6 col-md-3 no-padding">
						<div class="panel panel-blue panel-widget border-right">
							<div class="row no-padding"><em class="fa fa-xl fa-check-square-o color-blue"></em>
								<div class="large">
									<?php
									$countDoneAppoint = mysqli_query($connect, "SELECT * FROM `request_form` INNER JOIN user ON request_form.Client_ID = user.Client_ID WHERE request_form.Attorney_ID = $_SESSION[attorney_ID] and `status`='done'");
									echo mysqli_num_rows($countDoneAppoint);
									?>
								</div>
								<div class="text-muted">Done Appointments</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-md-3 no-padding">
						<div class="panel panel-orange panel-widget border-right">
							<div class="row no-padding"><em class="fa fa-xl fa-calendar-check-o color-teal"></em>
								<div class="large"><?php echo $rowssssss; ?></div>
								<div class="text-muted">Accepted Appointments</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-md-3 no-padding">
						<div class="panel panel-orange panel-widget border-right">
							<div class="row no-padding"><em class="fa fa-xl fa-tasks color-orange"></em>
								<div class="large"><?php echo $rowssss; ?></div>
								<div class="text-muted">Pending Appointments</div>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-md-3 no-padding">
						<div class="panel panel-red panel-widget ">
							<div class="row no-padding"><em class="fa fa-xl fa-calendar-times-o color-red"></em>
								<div class="large"><?php echo $rowsssss; ?></div>
								<div class="text-muted">Cancelled Appointments</div>
							</div>
						</div>
					</div>
				</div>
				<!--/.row-->
			</div>

			<?php if (isset($_SESSION['message'])) :  ?>


				<div class="alert alert-<?= $_SESSION['msg_type'] ?>">
					<?php
					echo $_SESSION['message'];
					unset($_SESSION['message']);
					?>
				</div>
			<?php endif ?>


		</div>
	</div>
	</div>

	<div class="panel panel-default col-md-8 col-md-offset-3" style="box-shadow: 0 7px 15px 0 #a8a6a6">
		<div class="panel-heading" style="color: #14759e;">
			Calendar
			<span class="pull-right clickable panel-toggle panel-button-tab-left">
				<em class="fa fa-toggle-up"></em></span>
		</div>
		<div class="panel-body">
			<?php include("atty_calendar.php") ?>
		</div>
	</div>
	<!--/.column-->
	<!--todo-->
	<div class="panel panel-default col-md-8 col-md-offset-3" style="box-shadow: 0 7px 15px 0 #a8a6a6">
		<div class="panel-heading" style="color: #14759e;">
			Todo
			<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
		</div>
		<div class="panel-body">

			<?php if (mysqli_num_rows($result1)) {
			?>
				<ul class="todo-list">

					<?php while ($rows = mysqli_fetch_assoc($result1)) {
					?>
						<li class="todo-list-item">
							<div class="checkbox">
								<p style="color: #14759e; "><?php echo $rows['todotitle']; ?></p>
							</div>
							<div class="pull-right action-buttons">
								<a href="index.php?edit_todo=<?php echo $rows['todo_ID'];  ?>" class="done"><em class="fa fa-check-square-o"></em></a>&emsp;
								<a href="process.php?delete_todo=<?php echo $rows['todo_ID']; ?>" class="trash"><em class="fa fa-trash-o"></em></a>
							</div>
						</li>
					<?php } ?>

				</ul>

			<?php } ?>
			<br>
			<div class="panel panel-default">
				<form class="input-group" action="savetodo.php" method="post">
					<input type="hidden" name="id" value=<?php echo $user_data['attorney_ID']; ?> />
					<input type="hidden" name="todo_id" value="<?php echo $todoid ?>">
					<input id="btn-input" type="text" class="form-control input-md" name="title" placeholder="Add new task" value="<?php echo $todotitle; ?>" />
					<span class="input-group-btn">
						<?php
						if ($edittodo == true) :
						?>
							<input type="submit" class="btn btn-success btn-md" name="update" value="Update">


						<?php else : ?>
							<input type="submit" class="btn btn-primary btn-md" name="btn1" value="Add">
						<?php endif; ?>
					</span>
				</form>
			</div>
		</div>
	</div>
	<!--end-->

	</div>
	<!--/.column-->

	<div class="panel panel-default col-md-8 col-md-offset-3" style="box-shadow: 0 7px 15px 0 #a8a6a6;">
		<div class="panel-heading" style="color: #14759e;">
			Appointments
			<span class="pull-right clickable panel-toggle panel-button-tab-left">
				<em class="fa fa-toggle-up"></em></span>
		</div>
		<div class="panel-body" style="height: 250px;">

		</div>
	</div>
	<!--/.column-->


	</div>
	<!--/.row-->
	</div>
	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>