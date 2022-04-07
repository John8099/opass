<?php
ob_start();
session_start();
include("connection.php");
if (count($_SESSION) == 0) {
    echo "<script>
        window.history.back();
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify OTP </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-50">
                <?php
                if (isset($_GET['verify'])) {
                    $otp = $_POST['otp_code'];
                    $user_id = 0;
                    if (isset($_SESSION['attorney_ID'])) {
                        $user_id = $_SESSION['attorney_ID'];
                    } else if (isset($_SESSION['Client_ID'])) {
                        $user_id = $_SESSION['Client_ID'];
                    }
                    if ($user_id != 0) {
                        if (isset($_SESSION["isAtty"])) {
                            $user_id = $_SESSION['attorney_ID'];
                            $sql = mysqli_query($connect, "SELECT * FROM twofa WHERE `user_id`='$user_id'");
                            if (mysqli_num_rows($sql) > 0) {
                                mysqli_query($connect, "DELETE FROM twofa WHERE `user_id`='$user_id'");
                                header("location:index.php");
                                exit();
                            }
                        } else {
                            $user_id = $_SESSION['Client_ID'];
                            $sql = mysqli_query($connect, "SELECT * FROM twofa WHERE `user_id`='$user_id'");
                            if (mysqli_num_rows($sql) > 0) {
                                mysqli_query($connect, "DELETE FROM twofa WHERE `user_id`='$user_id'");
                                header("Location:user_index.php");
                                exit();
                            }
                        }
                    } else {
                        echo "
                            <script>
                            alert('Error sending OTP Code.');
                            window.history.back();
                            </script>
                        ";
                    }
                }

                ?>
                <form action="?verify" class="login100-form validate-form flex-sb flex-w" method="POST">
                    <h5 class="col-sm-12 mb-4" style="text-align: center;">
                        <?php
                        if (isset($_SESSION['smsMaxLimit'])) {
                            echo "OTP sent to your Email";
                        } else {
                            echo "OTP sent to your Email and Mobile Number";
                        }
                        ?>
                    </h5>


                    <div class="wrap-input100 validate-input m-b-16">
                        <input class="input100" type="text" name="otp_code" id="otp" placeholder="OTP Code">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn m-t-17">
                        <button class="btn btn-success col-sm-12" type="submit" disabled id="verify">
                            Verify
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script>
        (function($) {
            $.fn.inputFilter = function(inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            };
        }(jQuery));

        $("#otp").inputFilter(function(value) {
            return /^-?\d*$/.test(value);
        });
        $("#otp").on("input", function() {
            if ($(this).val().length === 6) {
                $("#verify").prop("disabled", false);
            } else {
                $("#verify").prop("disabled", true);
            }
        });
    </script>

</body>

</html>