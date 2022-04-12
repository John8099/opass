<?php
session_start();

include("connection.php");
include("user_function.php");
include("user_attorney_view.php");
$user_data = check_login($connect);

?>




<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OPASS-HOME</title>
  
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
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
				<li class="active">Browse</li>
			</ol>
		</div>
		<!--/.row-->
		<br><br>
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-blue" style="box-shadow: 0 7px 15px 0 #a8a6a6">
				<div class="panel-heading dark-overlay">ATTORNEY'S PAGE!</div>
			</div>
		</div>
		<!--/.col-->

		<?php
		if (mysqli_num_rows($query)) {
		?>
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default" style="box-shadow: 0 7px 15px 0#a8a6a6">
					<div class="panel-heading dark-overlay" style="color:#14759e;">Our Attorneys!</div>
					<div class="panel-body">

						<?php while ($rows = mysqli_fetch_assoc($query)) {
						?>
							<div class="panel-body col-md-4">
								<div class="panel panel-blue" style="box-shadow: 0 7px 15px 0 grey">
									<div class="panel-heading dark-overlay">
										<p style=" color:#14759e; font-size: 18px;">Atty.<?php echo $rows['firstname']; ?>&nbsp;<?php echo $rows['lastname']; ?></p>
									</div>
									<div class="panel-body">
										<strong style="color:#14759e; ">Specializes in: </strong>
										<p style="color: white;"> <?php echo $rows['Specialization_name']; ?></p>
										<p style="color: white;"><?php ?> Age: <?php echo $rows['age']; ?></p>
										<a style="border: none; color: #14759e; box-shadow: 0 1px 4px 0 grey;" class='btn btn-primary' id='book' href="user_booking.php?bookatt=<?php echo $rows['attorney_ID']; ?>">Book Appointment</a>
										<a style="border: none; color: #14759e; box-shadow: 0 1px 4px 0 grey;" class='btn btn-primary' id='book' href="user_attorney_details.php?details=<?php echo $rows['attorney_ID']; ?>">More</a>
									</div>
								</div>
							</div>

						<?php }  ?>
					</div>
				</div>
			</div>
			<!--/.col-->

		<?php } ?>

	</div>
	<!--/.main-->


</body>

</html>