<?php
session_start();
include("connection.php");
$user_data = null;

if (isset($_SESSION['isAtty'])) {
    include("process.php");
    include("function.php");

    $user_data = check_login($connect);

    $g_id = $user_data["attorney_ID"];
    $fname = $user_data["firstname"];
    $mname = $user_data["middlename"];
    $lname = $user_data["lastname"];
    $age = $user_data["age"];
    $email = $user_data["email"];
    $contact = $user_data["contact"];
    $address = $user_data["address"];
    $uname = $user_data["Attorney_username"];
} else if (isset($_SESSION['isClient'])) {
    include("user_function.php");
    include("user_process.php");
    include("user_cancel.php");

    $user_data = check_login($connect);

    $g_id = $user_data["Client_ID"];
    $fname = $user_data["c_fname"];
    $mname = $user_data["c_mname"];
    $lname = $user_data["c_lname"];
    $age = $user_data["c_age"];
    $email = $user_data["c_email"];
    $contact = $user_data["c_number"];
    $address = $user_data["c_address"];
    $uname = $user_data["Username"];
}

if ($user_data == null) {
    // echo "<script>window.history.back()</script>";
}

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
    <?php if (isset($_SESSION['isAtty'])) :  ?>
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
                <li><a href="messages.php"><em class="fa fa-envelope-o">&nbsp;</em>Messages</a></li>
                <li><a href="notification.php"><em class="fa fa-check">&nbsp;</em>Done Appointments</a></li>
                <li><a href="attorney_logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
            </ul>
        </div>
    <?php else : ?>
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
                <li><a href="user_attorney.php"><em class="fa fa-black-tie">&nbsp;</em> Attorney</a></li>
                <li><a href="user_booking.php"><em class="fa fa-calendar">&nbsp;</em> Book Appointment</a></li>
                <li><a href="user_logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
            </ul>
        </div>
    <?php endif; ?>
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row" style="margin-top: 50px;">
            <div class="panel panel-container col-md-10 col-md-offset-1" style="box-shadow: 0 4px 20px 0 #a8a6a6;">
                <?php
                if (isset($_GET['update'])) {
                    $p_id = $_POST['id'];
                    $profile = $_FILES['profile'];
                    $fname = $_POST['fname'];
                    $mname = $_POST['mname'];
                    $lname = $_POST['lname'];
                    $age = $_POST['age'];
                    $email = $_POST['email'];
                    $contact = $_POST['contact'];
                    $address = $_POST['address'];
                    $schedule = $_POST['schedule'];
                    $yOfExp = $_POST['yOfExp'];
                    $special = $_POST['special'];

                    $uname = $_POST['uname'];
                    $password = $_POST['password'];
                    $c_password = $_POST['c_password'];

                    if (isset($_SESSION['isAtty'])) {
                        if (($password != $c_password) && ($password != "" || $c_password != "")) {
                            echo "
                                <script>
                                    alert('Passwords dont match')
                                    window.location.href = 'my-profile.php'
                                </script>
                                ";
                        } else {
                            if ($profile['name'] !== '') {
                                date_default_timezone_set("Asia/Manila");
                                $uploadfile = date("mdY-his") . "_" . basename($_FILES['profile']['name']);
                                if (!is_dir("profile-photo")) {
                                    mkdir("profile-photo", 0777, true);
                                }
                                if (move_uploaded_file($_FILES['profile']['tmp_name'], "profile-photo/$uploadfile")) {
                                    mysqli_query(
                                        $connect,
                                        "UPDATE attorney SET `profile`='profile-photo/$uploadfile' WHERE attorney_ID='$p_id'"
                                    );
                                } else {
                                    echo "
                                        <script>
                                            alert('Error uploading photo')
                                            window.location.href = 'my-profile.php'
                                        </script>
                                ";
                                }
                            }
                            if ($password == "" && $c_password == "") {
                                mysqli_query(
                                    $connect,
                                    "UPDATE `attorney` SET `firstname`='$fname',`lastname`='$lname',`age`='$age',`email`='$email', contact='$contact', `address`='$address', Schedule = '$schedule', Y_Exp = '$yOfExp', Specialization_ID = '$special' WHERE attorney_ID = $p_id"
                                );
                            } else {
                                $encryptedPass = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_query(
                                    $connect,
                                    "UPDATE `attorney` SET `firstname`='$fname', `lastname`='$lname', `age`='$age', `email`='$email', contact='$contact', `address`='$address', Schedule = '$schedule', Y_Exp = '$yOfExp', Specialization_ID = '$special', Attorney_username='$uname', Attorney_password='$encryptedPass' WHERE attorney_ID = $p_id"
                                );
                            }
                        }
                        echo "
                            <script>
                                window.location.href = 'my-profile.php'
                            </script>
                            ";
                    } else {
                        if (($password != $c_password) && ($password != "" || $c_password != "")) {
                            echo "
                                <script>
                                    alert('Passwords dont match')
                                    window.location.href = 'my-profile.php'
                                </script>
                                ";
                        } else {
                            if ($profile['name'] !== '') {
                                date_default_timezone_set("Asia/Manila");
                                $uploadfile = date("mdY-his") . "_" . basename($_FILES['profile']['name']);
                                if (!is_dir("profile-photo")) {
                                    mkdir("profile-photo", 0777, true);
                                }
                                if (move_uploaded_file($_FILES['profile']['tmp_name'], "profile-photo/$uploadfile")) {
                                    mysqli_query(
                                        $connect,
                                        "UPDATE user SET `profile`='profile-photo/$uploadfile' WHERE Client_ID='$p_id'"
                                    );
                                } else {
                                    echo "
                                        <script>
                                            alert('Error uploading photo')
                                            window.location.href = 'my-profile.php'
                                        </script>
                                ";
                                }
                            }
                            if ($password == "" && $c_password == "") {
                                mysqli_query(
                                    $connect,
                                    "UPDATE user SET c_fname='$fname', c_mname='$mname', c_lname='$lname', c_number='$contact', c_email='$email', c_age='$age', c_address='$address', Username='$uname' WHERE  Client_ID= $p_id"
                                );
                            } else {
                                $encryptedPass = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_query(
                                    $connect,
                                    "UPDATE user SET c_fname='$fname', c_mname='$mname', c_lname='$lname', c_number='$contact', c_email='$email', c_age='$age', c_address='$address', Username='$uname', `Password`='$encryptedPass' WHERE  Client_ID= $p_id"
                                );
                            }
                        }
                        echo "
                            <script>
                                window.location.href = 'my-profile.php'
                            </script>
                            ";
                    }
                }

                if (isset($_GET['removeProfile'])) {
                    if (isset($_SESSION['isAtty'])) {
                        mysqli_query(
                            $connect,
                            "UPDATE attorney SET `profile`='' WHERE attorney_ID='$_GET[id]'"
                        );
                        unlink($user_data['profile']);
                        echo "
                            <script>
                                window.location.href = 'my-profile.php'
                            </script>
                            ";
                    } else {
                        mysqli_query(
                            $connect,
                            "UPDATE user SET `profile`='' WHERE Client_ID='$_GET[id]'"
                        );
                        unlink($user_data['profile']);
                        echo "
                            <script>
                                window.location.href = 'my-profile.php'
                            </script>
                            ";
                    }
                }
                ?>
                <form class="form-horizontal" action="?update" method="POST" enctype="multipart/form-data">
                    <input name="id" type="hidden" class="form-control" value=<?php echo $g_id ?>>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <img id="prev_img" src="<?php echo empty($user_data['profile']) ? '' :  $user_data['profile'] ?>" style="width: 10em;border: 1px solid #808080;padding:10px; height: 105px;" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name" style="color:#14759e;"></label>
                        <div class="col-md-7">
                            <input accept="image/*" type='file' id="imgInp" name="profile" />

                        </div>
                    </div>
                    <?php
                    if ($user_data['profile'] != "") {
                    ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name" style="color:#14759e;"></label>
                            <div class="col-md-7">
                                <a href="?removeProfile&&id=<?php echo $g_id ?>" class="btn btn-danger">Remove Profile photo</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <script>
                        imgInp.onchange = evt => {
                            const [file] = imgInp.files
                            if (file) {
                                prev_img.src = URL.createObjectURL(file)
                            }
                        }
                    </script>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name" style="color:#14759e;">First Name: </label>
                        <div class="col-md-7">
                            <input name="fname" type="text" placeholder="First name" class="form-control" required style="height: 40px;" value=<?php echo $fname; ?>>
                        </div>
                    </div>
                    <!-- Name input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name" style="color:#14759e;">Middle Name: </label>
                        <div class="col-md-7">
                            <input name="mname" type="text" placeholder="Middle name" class="form-control" required style="height: 40px;" value=<?php echo $mname; ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name" style="color:#14759e;">Last Name: </label>
                        <div class="col-md-7">
                            <input name="lname" type="text" placeholder="Last name" class="form-control" required style="height: 40px;" value=<?php echo $lname; ?>>
                        </div>
                    </div>
                    <!-- Name input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name" style="color:#14759e;">Age: </label>
                        <div class="col-md-7">
                            <input name="age" type="text" placeholder="Age" class="form-control" required style="height: 40px;" value=<?php echo $age; ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email" style="color:#14759e;">E-mail: </label>
                        <div class="col-md-7">
                            <input name="email" type="text" placeholder="Email" class="form-control" required style="height: 40px;" value=<?php echo $email; ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email" style="color:#14759e;">Contact: </label>
                        <div class="col-md-7">
                            <input name="contact" type="text" placeholder="Contact" class="form-control" required style="height: 40px;" value=<?php echo $contact; ?>>
                        </div>
                    </div>

                    <!-- Address-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email" style="color:#14759e;">Address: </label>
                        <div class="col-md-7">
                            <input name="address" type="text" placeholder="Address" class="form-control" required style="height: 40px;" value=<?php echo $address; ?>>
                        </div>
                    </div>


                    <?php
                    if (isset($_SESSION['isAtty'])) :
                        $sql = "SELECT `Specialization_ID`, `Specialization_name` FROM `specialization` ";
                        $res = mysqli_query($connect, $sql);
                    ?>


                        <div class="form-group">
                            <label class="col-md-3 control-label" style="color:#14759e;">Schedule: </label>
                            <div class="col-md-7">
                                <input name="schedule" type="text" placeholder="Schedule" class="form-control" required style="height: 40px;" value=<?php echo $user_data['Schedule']; ?>>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" style="color:#14759e;">Years of Experience: </label>
                            <div class="col-md-7">
                                <input name="yOfExp" type="text" placeholder="Years of Experience" class="form-control" required style="height: 40px;" value=<?php echo $user_data['Y_Exp']; ?>>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email" style="color:#14759e;">Specialization: </label>
                            <div class="col-md-7">
                                <select name="special" class="form-control" style="height: 40px; border: none;">
                                    <?php
                                    $s = mysqli_fetch_object(
                                        mysqli_query(
                                            $connect,
                                            "SELECT `Specialization_ID`, `Specialization_name` FROM `specialization` WHERE Specialization_ID = $user_data[Specialization_ID]"
                                        )
                                    );
                                    echo "<option value = '$user_data[Specialization_ID]'>$s->Specialization_name</option>";
                                    while ($rows = mysqli_fetch_assoc($res)) {
                                        $id = $rows['Specialization_ID'];
                                        $spec = $rows['Specialization_name'];
                                        if ($id != $user_data["Specialization_ID"]) {
                                            echo "<option value = '$id'>$spec</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email" style="color:#14759e;">Username: </label>
                        <div class="col-md-7">
                            <input name="uname" type="text" placeholder="Address" class="form-control" required style="height: 40px;" value=<?php echo $uname; ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email" style="color:#14759e;">Password: </label>
                        <div class="col-md-7">
                            <input name="password" type="password" placeholder="Password" class="form-control" style="height: 40px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email" style="color:#14759e;">Confirm Password: </label>
                        <div class="col-md-7">
                            <input name="c_password" type="password" placeholder="Confirm Password" class="form-control" style="height: 40px;">
                        </div>
                    </div>

                    <!-- Form actions -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="float: right; margin-right: 25px">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!--/.row-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>