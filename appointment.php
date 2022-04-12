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
	<link href="css/msg.css" rel="stylesheet">
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
			<li class="active"><a href="appointment.php"><em class="fa fa-calendar">&nbsp;</em> Appointments</a></li>
			<li><a href="messages.php"><em class="fa fa-envelope-o">&nbsp;</em>Messages</a></li>
			<li><a href="notification.php"><em class="fa fa-check">&nbsp;</em>Done Appointments</a></li>
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
				<li class="active">Appointments</li>
			</ol>
		</div>
		<!--row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color: #14759e; margin-bottom: -10px;">Appointments</h1>
			</div>

		</div>
		<!--/.row-->
		<?php if (isset($_SESSION['message'])) :  ?>


			<div class="alert alert-<?= $_SESSION['msg_type'] ?>">
				<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
				?>
			</div>
		<?php endif ?>

		<?php
		if (mysqli_num_rows($queryresult)) {
		?>
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
							<th style="color: #14759e;" class="col-md-1">
								&nbsp;&nbsp;&nbsp;Status
							</th>
							<th style="color: #14759e;" class="col-md-1">
								&emsp;&emsp;&emsp;Action
							</th>

						</tr>
					</thead>
					<?php while ($rows = mysqli_fetch_assoc($queryresult)) {
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

							<?php if ($rows['status'] == 'pending') { ?>

								<td>
									<label class="btn btn-warning btn-sm" style="cursor:auto;">Pending</label>

								</td>
								<td style="padding-left: 30px;">
									<form action="attorney_process.php" method="post">

										<input type="hidden" name="app_admin_id" value=<?php echo $user_data['attorney_ID']; ?> class="form-control input-md col-md-2">
										<input type="hidden" name="app_atty_id" class="form-control input-md col-md-3" value="<?php echo $atty_ID ?>">
										<input type="hidden" name="app_client_id" class="form-control input-md col-md-3" value="<?php echo $Client_ID ?>">
										<input type="hidden" name="app_req_id" class="form-control input-md col-md-3" value="<?php echo $req_ID ?>">

									</form>

									<a href="accepted.php?accept=<?php echo $rows['Request_ID'] ?>" style="text-decoration: none;"><input class="btn btn-primary btn-sm" type="submit" value="Accept" id="btnaccept" name="acceptapp"></a>

									<a href="cancellation.php?cancel=<?php echo $rows['Request_ID'] ?>" style="text-decoration: none; "><input class="btn btn-danger btn-sm" type="submit" value="Cancel" id="btncancel" name="cancelapp" style="display: flex; margin-left: 70px; margin-top: -30px;">&nbsp;&nbsp;&nbsp;</a>

									<a style="border: none;" class="delete" id="deletemodal" href="process.php?deleteapp=<?php echo $rows['Request_ID']; ?>"><em style="color: #ff744d; cursor: pointer; display: flex; margin-left: 140px; margin-top: -40px;" class="fa fa-trash-o fa-lg"></em></a>

								</td>

								<?php	} else {
								if ($rows['status'] == 'cancelled') {  ?>
									<td>
										<label class="btn btn-danger btn-sm" style="cursor:auto;">Cancelled</label>

									</td>
									<td style="padding-left: 30px;">
										<a href="accepted.php?accept=<?php echo $rows['Request_ID'] ?>" style="text-decoration: none;"><input class="btn btn-primary btn-sm" type="submit" value="Accept" id="btnaccept" name="acceptapp" disabled></a>

										<a href="cancellation.php?cancel=<?php echo $rows['Request_ID'] ?>" style="text-decoration: none; "><input class="btn btn-danger btn-sm" type="submit" value="Cancel" id="btncancel" name="cancelapp" style="display: flex; margin-left: 70px; margin-top: -30px;" disabled>&nbsp;&nbsp;&nbsp;</a>

										<a style="border: none;" class="delete" id="deletemodal" href="process.php?deleteapp=<?php echo $rows['Request_ID']; ?>"><em style="color: #ff744d; cursor: pointer; display: flex; margin-left: 140px; margin-top: -40px;" class="fa fa-trash-o fa-lg"></em></a>

									</td>
								<?php
								}
								?>
							<?php	}

							if ($rows['status'] == 'accepted') { ?>
								<td>
									<label class="btn btn-success btn-sm" style="cursor:auto;">Accepted</label>

								</td>
								<td>
									<button style="float: right;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#chat<?php echo $rows['Request_ID'] ?>">
										Chat
									</button>
								</td>
								<!-- Modal -->
								<div class="modal fade" id="chat<?php echo $rows['Request_ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body" style="height: 120px; position: relative">

												<div class="type_msg" style=" position: absolute; bottom: 0; width: 93%">
													<div class="input_msg_write">
														<form action="attyChat.php" method="POST" enctype="multipart/form-data">
															<input type="text" name="clientId" value="<?php echo $rows['Client_ID'] ?>" readonly hidden>
															<div class="attach_file" id="divAttach<?php echo $rows['Request_ID'] ?>" style="display: none;">
																<input type="file" name="attachedFile" id="inputAttachedFile<?php echo $rows['Request_ID'] ?>">
																<button type="button" id="closeAttach<?php echo $rows['Request_ID'] ?>">
																	<i class="fa fa-times-circle-o" aria-hidden="true"></i>
																</button>
															</div>
															<textarea style="width: 100%;" class="write_msg" name="chat" placeholder="Type a message"></textarea>
															<button class="msg_send_btn" type="submit">
																<i class="fa fa-paper-plane-o" aria-hidden="true"></i>
															</button>
															<button class="msg_attach_file" type="button" id="btnAttach<?php echo $rows['Request_ID'] ?>">
																<i class="fa fa-paperclip" aria-hidden="true"></i>
															</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<script>
									$("#btnAttach<?php echo $rows['Request_ID'] ?>").on("click", function() {
										$(this).hide();
										$("#divAttach<?php echo $rows['Request_ID'] ?>").show()
									})

									$("#closeAttach<?php echo $rows['Request_ID'] ?>").on("click", function() {
										$("#divAttach<?php echo $rows['Request_ID'] ?>").hide()
										$("#btnAttach<?php echo $rows['Request_ID'] ?>").show()
										$("#inputAttachedFile<?php echo $rows['Request_ID'] ?>").val("")
									})
								</script>
								<td style="padding-left: 30px;">
									<a href="done_appointment.php?done=<?php echo $rows['Request_ID'] ?>" style="text-decoration: none;">
										<input style="width: 130px;" class="btn btn-primary btn-sm" type="submit" value="End Appointment" id="btnaccept" name="acceptapp">
										</ <a style="border: none;" class="delete" id="deletemodal" href="process.php?deleteapp=<?php echo $rows['Request_ID']; ?>">
										<em style="color: #ff744d; cursor: pointer; display: flex; margin-left: 140px; margin-top: -20px;" class="fa fa-trash-o fa-lg"></em>
									</a>
								</td>

							<?php	} ?>

						</tr>
					<?php } ?>
				</table>
			</div>
		<?php } ?>
	</div>

	<div class="panel panel-default col-md-8 col-md-offset-2">

	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#btnsearch').click(function(e) {
				e.preventDefault();
				var search = $('#btn-input').val();

				if (search != "") {

					$.ajax({
						url: 'user_search_result.php',
						method: 'post',
						data: {
							query: search
						},
						success: function(response) {
							$("#results").html(response);
						}

					});

				} else {

					alert("No Input!");

				}



			});
		});
	</script>

</body>

</html>