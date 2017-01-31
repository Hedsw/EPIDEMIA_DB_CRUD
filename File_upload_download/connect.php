<?php

$hostname = "localhost";
$username = "root";
$password = "root";
$database = "File";

$con = mysqli_connect("$hostname","$username","$password","$database") or die('Error Connecting to MySQL server.');

mysqli_select_db($con, $database) or die('Error in mysqli');

?>
