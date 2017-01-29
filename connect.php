<?php
  $hostname = "localhost";
  $username = "root";
  $password = "dbsgur123";
  $database = "epidemia_test";

  $conn = mysql_connect("$hostname","$username","$password") or die(mysql_error());
	mysql_select_db("$database", $conn) or die(mysql_error());
?>
