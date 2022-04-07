<?php  
    include("connection.php");
    include("function.php");

    if ($_SERVER['REQUEST_METHOD']=="POST") 
    {
            $id = $_POST['user_id'];
            $fname1 = $_POST['user_fname'];
            $mname1 = $_POST['user_mname'];
            $lname1 = $_POST['user_lname'];
            $num = $_POST['cnumber'];
            $email1 = $_POST['user_email'];
            $age1 = $_POST['user_age'];
            $address = $_POST['user_address'];
            $username = $_POST['user_username'];
            $password = $_POST['user_password'];
            $repass = $_POST['user_re_password'];

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);


            if ($password == $repass) {
                $sqli = "INSERT INTO `user`(`Client_ID`, `c_fname`, `c_mname`, `c_lname`, `c_number`, `c_email`, `c_age`, `c_address`, `Username`, `Password`) VALUES ('$id','$fname1', '$mname1' , '$lname1' , '$num', '$email1','$age1', '$address', '$username' , '$hashed_password' )" ; 

                    $result = mysqli_query($connect, $sqli); 
                    echo "<script>alert('Data inserted Successfully');</script>";
                    header("location: ulogin.php");

            }else
            {
                    echo "<script type = text/javascript>";
                    echo 'alert("Invalid Input")';
                    echo "</script>";
                    header("location: user_registration.php");
            }
    

    }


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OPASS</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div><img src="5.png" class="reglogo"></div>
    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="post" id="signup-form" class="signup-form" role="form">
                        <h2 class="form-title" style="font-family: monospace;" >Create account</h2>

                         <input type="hidden" name="user_id" value=<?php  echo random_num(11); ?> />
                        <div class="form-group">
                            <input type="text" style="font-family: century gothic;" class="form-input" name="user_fname" id="name" placeholder="First Name" required="" />
                        </div>
                        <div class="form-group">
                            <input type="text" style="font-family: century gothic;" class="form-input" name="user_mname" id="name" placeholder="Middle Name" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" style="font-family: century gothic;" class="form-input" name="user_lname" id="name" placeholder="Last Name" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="Number" style="font-family: century gothic;" class="form-input" name="cnumber" id="num" placeholder="Your Phone Number" required=""/>
                        </div>
                         <div class="form-group">
                            <input type="email" style="font-family: century gothic;" class="form-input" name="user_email" id="email" placeholder="Your Email" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" style="font-family: century gothic;" class="form-input" name="user_age" id="age" placeholder="Age" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" style="font-family: century gothic;" class="form-input" name="user_address" id="address" placeholder="Your Address" required=""/>
                        </div>
                         <div class="form-group">
                            <input type="text" style="font-family: century gothic;" class="form-input" name="user_username" id="user" placeholder="Username" required=""/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" style="font-family: century gothic;" class="form-input" name="user_password" id="password" placeholder="Password" required=""/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" style="font-family: century gothic;" class="form-input" name="user_re_password" id="re_password" placeholder="Repeat your password" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" style=" cursor: pointer;" />
                        </div>
                    </form>
                    <p class="loginhere" style="font-family: century gothic;">
                        Have already an account ? <a href="ulogin.php" style="font-family: century gothic;" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>