<?php
// Local
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "opass";

// Domain
// $dbhost = "sql113.epizy.com";
// $dbuser = "epiz_30390914";
// $dbpass = "STOFVDEmdWDthvI";
// $dbname = "epiz_30390914_opass";

if (!$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

	die("failed to Connect!");
}

