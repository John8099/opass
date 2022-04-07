<?php

 include("connection.php");

 $sql = "SELECT * FROM attorney INNER JOIN specialization ON attorney.specialization_ID = specialization.specialization_ID";
 $result = mysqli_query($connect , $sql);

 $sqli = " SELECT * FROM `todo` WHERE Attorney_id = '$_SESSION[attorney_ID]'";
 $result1 = mysqli_query($connect, $sqli);

?>