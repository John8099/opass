<?php
	include('connection.php');

	$output ='';

	if (isset($_POST['query'])) {
		$search = $_POST['query'];

		$stmt = $connect->prepare("SELECT * FROM `attorney` INNER JOIN specialization ON attorney.specialization_ID = specialization.specialization_ID WHERE firstname LIKE CONCAT('%',?,'%') OR lastname LIKE CONCAT('%',?,'%') OR Schedule LIKE CONCAT('%',?,'%') OR Specialization_name LIKE CONCAT('%',?,'%')");
		$stmt->bind_param("ssss", $search, $search, $search,$search);
	}else {
		$stmt = $connect->prepare("SELECT * FROM `attorney`");
	}
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows>0) {
		$output = "<thead>
						<tr >
							<th id='tabletitle1'>Name</th>
		  					<th id='tabletitle1'>Lastname</th>
		  					<th id='tabletitle1'>Schedule</th>
		  					<th id='tabletitle1'>Specialization</th>
		  					<th id='tabletitle1'>&emsp;&emsp;Actions</th>
						</tr>
					</thead>
					<tbody>";

					while ($rows = $result->fetch_assoc()) {
						$output .= 

							"<tr>
							
							<td >
								 ".$rows['firstname']."
							</td>

							<td>
								 ".$rows['lastname']."
							</td>

							<td>
								 ".$rows['Schedule']."
							</td>

							<td>
								".$rows['Specialization_name']."
							</td>

							<td>
							<a class='btn btn-primary' id='book' href='user_booking.php?book=".$rows['attorney_ID']."'>Book Appointment</a>
							</td>

							</tr>";

					}


					$output .= "</tbody"; 
					echo $output;
	}else{

		echo "<h3 id='tabletitle' style='margin-left: 20px;'>No Records Found!</h3>";
	}
?>