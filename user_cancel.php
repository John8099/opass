<?php 

 //view cancelled 
include("connection.php");

 $sqli = "SELECT * FROM `appointment` INNER JOIN request_form ON appointment.Request_ID = request_form.Request_ID INNER JOIN attorney ON appointment.attorney_ID = attorney.attorney_ID  INNER JOIN user ON appointment.client_ID = user.Client_ID WHERE appointment.client_ID = $_SESSION[Client_ID]";
 $result = mysqli_query($connect,$sqli);




 ?>