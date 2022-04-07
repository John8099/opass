<?php
session_start();
include("connection.php");

$query = mysqli_query($connect, "SELECT * FROM `request_form` INNER JOIN user ON request_form.Client_ID = user.Client_ID WHERE request_form.Attorney_ID = $_SESSION[attorney_ID] and `status` = 'accepted'");

$arr = array();

while ($res = mysqli_fetch_object($query)) {
    $title = ucwords("$res->request_name ($res->lname)");
    preg_match_all('!\d+!', $res->Appointment_Time, $matches);
    if ($matches[0]) {
        $hour = (int)$matches[0][0];
        $minute = count($matches[0]) > 1 ? $matches[0][1] : "00";
        if (strpos(strtolower($res->Appointment_Time), "am") === false) {
            $hour += 12;
        }
        $time = date("H:i", strtotime("$hour:$minute"));
        $date = date("Y-m-d", strtotime($res->Appointment_date));
        $startTime = "$date $time";
        array_push($arr, [
            "title" => $title,
            "start" => $startTime
        ]);
    }
    else {
        array_push($arr, [
            "title" => $title,
            "start" => date("Y-m-d", strtotime($res->Appointment_date))
        ]);
    }
}
print_r(json_encode($arr));

// dateFormat Y-m-d
