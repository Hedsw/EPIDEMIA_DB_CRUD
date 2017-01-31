<?php
//console.log("Not connected");

include ("connect.php");
if(isset($_POST["submit"]))
  {
    $file = $_FILES["file"]["tmp_name"];
    $handle = fopen($file, "r");
    $c = 0;
    while(($filesop = fgetcsv($handle, 10000, ",")) !== false)
    {
      $id = $filesop[0];
      $var_name = $filesop[1];
      $woreda_name = $filesop[2];
      $WID = $filesop[3];
      $Date_h = $filesop[4];
      $obs_value = $filesop[5];
      $anom = $filesop[6];
      $stand_anom = $filesop[7];

     $sql = mysqli_query($conn, "INSERT INTO epidemia_v2 (id, var_name, woreda_name, WID, Date_h, obs_value, anom, stand_anom) VALUES ('$id','$var_name','$woreda_name','$WID','$Date_h','$obs_value','$anom','$stand_anom')");
      $c = $c + 1;
    }
      if($sql) {
        echo "You database has imported successfully. You have inserted ". $c ." recoreds";
      } else {
        echo "Sorry! There is some problem.";
      }
    }
  else {
    echo "This not connected!";
    console.log("Not connected");
  }
?>
