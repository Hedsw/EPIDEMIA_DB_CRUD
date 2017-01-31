<?php

include('connect.php');

if(isset($_GET['dow'])) {
  $path = $_GET['dow'];
  $res = mysqli_query($con, "SELECT * FROM File WHERE path='$path'");
    //Table이 바뀔 때 마다 SELECT * FROM File되어 있는곳에서 File을 바뀐거로 바꿔야함.
  header('content-type: application/octent-strem');
  header('content-disposition: attachment; filename='.$path.'');
  header('content-length: ' .filesize($path));
  readfile($path);
  }

?>
