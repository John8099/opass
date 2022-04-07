<?php
include("connection.php");
include("process.php");
include("function.php");
include("encript_decrypt.php");
$user_data = check_login($connect);

$_SESSION['msgClientId'] = "";
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
			<li><a href="appointment.php"><em class="fa fa-calendar">&nbsp;</em> Appointments</a></li>
			<li class="active"><a href="messages.php"><em class="fa fa-envelope-o">&nbsp;</em>Messages</a></li>
			<li><a href="notification.php"><em class="fa fa-check">&nbsp;</em>Done Appointments</a></li>
			<li><a href="attorney_logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<!-- <div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Messages</li>
			</ol>
		</div> -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color: #14759e;margin: 0">Messages</h1>
			</div>
		</div>
		<!--/.row-->
		<div class="messaging" id="messaging">
			<div class="inbox_msg" id="inbox">
				<div class="inbox_people">
					<div class="inbox_chat">
						<?php
						if (isset($_GET['changeSession'])) {
							$_SESSION['msgClientId'] = $_GET['val'];
						}
						$senders = [];
						$people = mysqli_query(
							$connect,
							"SELECT * FROM chat WHERE sender_id = $_SESSION[attorney_ID]"
						);
						$count = 0;
						if (mysqli_num_rows($people) > 0) :
							while ($resSender = mysqli_fetch_object($people)) :
								if (!in_array($resSender->send_to, $senders)) {
									array_push($senders,  $resSender->send_to);
								}
								$count++;
								if ($count == 1 && (!isset($_SESSION["msgClientId"]) || $_SESSION["msgClientId"] == "") && !isset($_GET['changeSession'])) {
									$_SESSION['msgClientId'] = $resSender->send_to;
								}
							endwhile;
							for ($i = 0; $i < count($senders); $i++) :
								$res = mysqli_fetch_object(
									mysqli_query(
										$connect,
										"SELECT * FROM chat WHERE send_to = '$senders[$i]' LIMIT 1"
									)
								);
						?>
								<a href="?changeSession&&val=<?php echo $res->send_to ?>">
									<div class="chat_list <?php
															if ($i == 0 && !isset($_GET['val'])) {
																echo "active_chat";
															} else {
																if (isset($_GET['val']) && $_GET['val'] == $res->send_to) {
																	echo "active_chat";
																}
															}

															?>">
										<div class="chat_people">
											<div class="chat_img">
												<?php
												$info = mysqli_fetch_object(
													mysqli_query(
														$connect,
														"SELECT * FROM user WHERE Client_ID = $res->send_to"
													)
												);
												if ($info->profile == "") {
												?>
													<em class="fa fa-user-circle-o fa-3x"></em>
												<?php
												} else {
												?>
													<img id="prev_img" src="<?php echo $info->profile ?>" />
												<?php
												}
												?>
											</div>
											<div class="chat_ib">
												<h5>
													<strong>
														<?php echo ucwords("$info->c_fname $info->c_lname") ?>
													</strong>
												</h5>
											</div>
										</div>
									</div>
								</a>
							<?php
							endfor;
						else : ?>
							<div style="margin: 15px;text-align:center">
								<h4>No Conversation yet</h4>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="mesgs">
					<div class="msg_history" id="history">
						<?php
						if (mysqli_num_rows($people) > 0) :
							$messages = mysqli_query(
								$connect,
								"SELECT * FROM chat WHERE (sender_id=$_SESSION[msgClientId] and send_to=$_SESSION[attorney_ID]) or (sender_id=$_SESSION[attorney_ID] and send_to=$_SESSION[msgClientId])"
							);
							if (mysqli_num_rows($messages) > 0) {
								while ($msgs = mysqli_fetch_object($messages)) :
									if ($msgs->send_to == $_SESSION['msgClientId']) :
										$clientInfo = mysqli_fetch_object(
											mysqli_query(
												$connect,
												"SELECT * FROM user WHERE Client_ID='$msgs->send_to'"
											)
										)
						?>
										<div class="outgoing_msg">
											<div class="sent_msg">
												<?php
												$decrypt = encrypt_decrypt($msgs->content, 'decrypt');
												if (strpos($decrypt, "media") !== false) {
												?>
													<p>
														<a href="<?php echo $decrypt ?>" download="<?php echo explode("_", $decrypt)[1] ?>">
															<?php echo explode("_", $decrypt)[1] ?>
														</a>
													</p>
												<?php
												} else {
												?>
													<p>
														<?php echo encrypt_decrypt($msgs->content, 'decrypt') ?>
													</p>
												<?php
												}
												?>

												<span class="time_date">
													<?php
													echo  date("h:i A | F d, Y", strtotime($msgs->send_time))
													?>
												</span>
											</div>
										</div>
									<?php else : ?>
										<div class="incoming_msg">
											<div class="incoming_msg_img">
												<?php
												if ($clientInfo->profile == "") {
												?>
													<em class="fa fa-user-circle-o fa-3x"></em>
												<?php
												} else {
												?>
													<img id="prev_img" src="<?php echo $clientInfo->profile ?>" />
												<?php
												}
												?>
											</div>
											<div class="received_msg">
												<div class="received_withd_msg">
													<?php
													$decrypt = encrypt_decrypt($msgs->content, 'decrypt');
													if (strpos($decrypt, "media") !== false) {
													?>
														<p>
															<a href="<?php echo $decrypt ?>" download="<?php echo explode("_", $decrypt)[1] ?>">
																<?php echo explode("_", $decrypt)[1] ?>
															</a>
														</p>
													<?php
													} else {
													?>
														<p>
															<?php echo encrypt_decrypt($msgs->content, 'decrypt') ?>
														</p>
													<?php
													}
													?>
													<span class="time_date">
														<?php
														echo  date("h:i A | F d, Y", strtotime($msgs->send_time))
														?>
													</span>
												</div>
											</div>
										</div>

							<?php
									endif;
								endwhile;
							} else {
								echo '<div style="margin: 15px;text-align:center">
										<h4>No Messages yet</h4>
									</div>';
							}
						else : ?>
							<div style="margin: 15px;text-align:center">
								<h4>Start Chating</h4>
							</div>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
		<div class="type_msg">
			<?php
			if (isset($_GET['chat'])) {
				$chat = $_POST['chat'];
				$attachedFile = $_FILES['attachedFile'];
				$sender = $_SESSION['attorney_ID'];
				$sendTo = $_SESSION['msgClientId'];

				$sql = null;
				if ($chat != "" || $attachedFile['name'] != "") {
					if ($attachedFile['name'] != "") {
						date_default_timezone_set("Asia/Manila");
						$uploadfile = date("mdY-his") . "_" . basename($attachedFile['name']);
						$encryptFile = encrypt_decrypt("media/$uploadfile", 'encrypt');
						if (!is_dir("media")) {
							mkdir("media", 0777, true);
						}
						if (move_uploaded_file($attachedFile['tmp_name'], "media/$uploadfile")) {
							mysqli_query($connect, "INSERT chat(sender_id, send_to, content) VALUES('$sender', '$sendTo', '$encryptFile')");
						}
					}
					if ($chat != "") {
						$encryptChat = encrypt_decrypt($_POST['chat'], 'encrypt');
						mysqli_query($connect, "INSERT chat(sender_id, send_to, content) VALUES('$sender', '$sendTo', '$encryptChat')");
					}
				}
				echo "<script>
					window.location.href = 'messages.php'
				</script>";
			}
			?>
			<div class="input_msg_write">
				<form action="?chat" method="POST" enctype="multipart/form-data">
					<div class="attach_file" id="divAttach" style="display: none;">
						<input type="file" name="attachedFile" id="inputAttachedFile">
						<button type="button" id="closeAttach">
							<i class="fa fa-times-circle-o" aria-hidden="true"></i>
						</button>
					</div>
					<input type="text" class="write_msg" name="chat" placeholder="Type a message" />
					<button class="msg_send_btn" type="submit">
						<i class="fa fa-paper-plane-o" aria-hidden="true"></i>
					</button>
					<button class="msg_attach_file" type="button" id="btnAttach">
						<i class="fa fa-paperclip" aria-hidden="true"></i>
					</button>
				</form>
			</div>
		</div>

	</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>

	<script>
		$(document).ready(function() {
			const divAttach = $("#divAttach")
			const closeAttach = $("#closeAttach")
			const btnAttach = $("#btnAttach")
			const inputAttachedFile = $("#inputAttachedFile")

			$("#history")[0].scrollTop = $("#history")[0].scrollHeight - $("#history").height();
			var lastScrollPos = $("#history")[0].scrollHeight - $("#history").height();

			setInterval(function() {
				$('#history').on('scroll', function() {
					lastScrollPos = this.scrollTop
				});

			}, 1000)

			setInterval(function() {
				$("#messaging").load(`${location.href} #inbox`, function() {
					$('#history').scrollTop(lastScrollPos);
				});
			}, 3000)


			btnAttach.on("click", function() {
				$(this).hide();
				divAttach.show()
			})

			closeAttach.on("click", function() {
				divAttach.hide()
				btnAttach.show()
				inputAttachedFile.val("")
			})
		});
	</script>


</body>

</html>