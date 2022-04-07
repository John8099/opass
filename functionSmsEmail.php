<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Send sms notif
function sendSms($number, $message)
{
	$url = 'https://www.itexmo.com/php_api/api.php';
	$apicode = "TR-STUDE423049_K6UIA";
	$passwd = "ga)zk8$2})";
	$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
	$param = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($itexmo),
		),
	);
	$context  = stream_context_create($param);
	return file_get_contents($url, false, $context);
}

// Send Email notif
function sendEmail($sendTo, $content)
{
	require "vendor/PHPMailer/vendor/autoload.php";
	$mail = new PHPMailer(true);

	try {
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = 1;
		$mail->Username = "pedro.juan42069@gmail.com";
		$mail->Password = 'juanpedro42069';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';

		$mail->setFrom("pedro.juan42069@gmail.com");
		$mail->addAddress($sendTo);
		$mail->addReplyTo("noreply@google.com");

		$html_body = file_get_contents('email-template.php');
		$html_body = str_replace('%content%', $content, $html_body);
		$mail->addEmbeddedImage("5.png", "logo");
		$mail->IsHTML(true);
		$mail->Subject = "OPASS";
		$mail->Body    = $html_body;
		return $mail->send();
	} catch (Exception $e) {
		return false;
	}
}

function isValidEmail($email)
{
	$emailRegex = "/^(([^<>()[\]\\.,;:\s@']+(\.[^<>()[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
	if (preg_match($emailRegex, $email)) {
		return true;
	} else {
		return false;
	}
}

function getValidNumbers($arrNumbers = [])
{
	$validNumbers = array();
	foreach ($arrNumbers as $number) {
		if (preg_match("/09|\+63|63/", $number)) {
			if (preg_match("/^(\+63|63)\d{10}$/", $number)) {
				array_push($validNumbers, "+63" . preg_split("/\+63|63/", $number)[1]);
			} else if (preg_match("/^(09)\d{9}$/", $number)) {
				array_push($validNumbers, "+639" . preg_split("/^09/", $number)[1]);
			}
		}
	}
	return $validNumbers;
}

//create OTP Code
function generateOTP($connect) {
	$otp = rand(100000, 999999);
	$checkOTP = mysqli_query($connect, "SELECT * FROM twofa WHERE code = '$otp'");
	if (mysqli_num_rows($checkOTP) > 0) {
		generateOTP($connect);
	}
	return $otp;
}

// print_r(sendSms("+639279172745", "Test"));