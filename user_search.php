<?php
session_start();

include("connection.php");
include("user_function.php");

$user_data = check_login($connect);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OPASS-SEARCH</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


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
				<a href="user_search.php" style=""><input type="sumbit" value="Search" class="btn btn-primary" style="cursor: pointer;"></a>
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
				<li class="active">Search</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<h2 class="page-header" style="color: #14759e;">Search Attorney</h2>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="panel panel-default col-md-10 col-md-offset-1">
				<form class="input-group" method="post" action="#">
					<input type="hidden" name="searchfield" />
					<input id="btn-input" type="text" class="form-control input-md" name="search" placeholder="Search for Name, Schedule, or Specialization" />
					<span class="input-group-btn">
						<input type="submit" class="btn btn-primary btn-md" name="btn1" value="Search" id="btnsearch">
					</span>
				</form>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="table-responsive col-md-10 col-md-offset-1">
				<table class="table table-borderless w-auto" style="box-shadow: 0 3px 10px 0 #a8a6a6;" id="results">
				</table>
			</div>
		</div>

	</div>
	<!--/.main-->
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