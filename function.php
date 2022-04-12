<?php


function check_login($connect)
{

  if (isset($_SESSION['attorney_ID'])) {

    $id = $_SESSION['attorney_ID'];

    $query = "SELECT * from `attorney` WHERE attorney_ID = '$id' ";

    $result = mysqli_query($connect, $query);
    if ($result && mysqli_num_rows($result) > 0) {

      $user_data = mysqli_fetch_assoc($result);
      return $user_data;
    }
  } else {
    header("location: attorney_login.php");
    die;
  }
}

//iya ka mag generate ka ID
function random_num($length)
{

  // $text = "";

  // if ($length < 5) {

  // 	$length = 5;
  // }
  // $id_length = rand(4, $length);

  // for ($i = 0; $i < $id_length; $i++) {

  // 	$text .= rand(0, 9);
  // }
  // return $text;

  return rand(time(), 100000000);
}

//katapusan
