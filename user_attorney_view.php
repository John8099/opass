<?php
include("connection.php");

$attorneyID = '';
$fname = '';
$lname = '';

if (isset($_GET['bookatt'])) {
		$id = $_GET['bookatt'];
		$result = $connect->query("SELECT * FROM `attorney` INNER JOIN specialization ON attorney.specialization_ID = specialization.specialization_ID WHERE attorney_ID = $id") or die($connect->error());
	if (count($result)==1) {
		$row =$result->fetch_array();

		$attorneyID = $row['attorney_ID'];
		$fname = $row['firstname'];
		$lname = $row['lastname'];

		}
	}

//attorney view

 $sql = "SELECT * FROM `attorney` INNER JOIN specialization ON attorney.specialization_ID = specialization.specialization_ID ORDER BY attorney_ID";
 $query = mysqli_query($connect,$sql);



?>