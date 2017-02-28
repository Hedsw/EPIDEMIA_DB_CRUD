<?php
include('connect.php');

//$spl = "SELECT * FROM documents";
//Select * FROM 뒤에다가 테이블 이름
$res = mysqli_query($con, "SELECT * FROM File");

?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Documents</title>
  </head>
  <body>

      <a href="upload.php">Add new Document</a> <br>
      <br>
      <br>
      <br>
      <?php
        while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
          $id = $row['ID'];
          $name = $row['name'];
          $path = $row['path'];
          echo "Number -".$id. " Name -" . $name . " || Click to download ->". "<a href='download.php?dow=$path'>Download</a><br><br>";
        }
       ?>

  </body>
</html>


<!-- 해야 할 것 업로드 날짜 추가하기, 테이블로 만들어서 좀 이쁘게 만들기  -->
