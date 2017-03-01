<!-- Putty 접속하는법
ssh leey@kabru.sdstated.edu
접속 비밀번호 yunhyeokLEE!
mysql -u epidemiaweb_test -p epidemia_test
Mysql password : eishoo6Pheis
 -->

<!DOCTYPE html>
<style>
    @import url('http://fonts.googleapis.com/css?family=Amarante');
  html { overflow-y: scroll; }

  ::selection { background: #5f74a0; color: #fff; }
  ::-moz-selection { background: #5f74a0; color: #fff; }
  ::-webkit-selection { background: #5f74a0; color: #fff; }

  /** page structure **/
  #wrapper {
    display: block;
    width: 850px;
    background: #fff;
    margin: 0 auto;
    padding: 10px 17px;
    -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
  }

  #keywords {
    margin: 0 auto;
    font-size: 1.2em;
    margin-bottom: 15px;
  }


  #keywords thead {
    cursor: pointer;
    background: #c9dff0;
  }
  #keywords thead tr th {
    font-weight: bold;
    padding: 12px 30px;
    padding-left: 42px;
  }
  #keywords thead tr th span {
    padding-right: 20px;
    background-repeat: no-repeat;
    background-position: 100% 100%;
  }

  #keywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
    background: #acc8dd;
  }

  #keywords thead tr th.headerSortUp span {
    background-image: url('http://i.imgur.com/SP99ZPJ.png');
  }
  #keywords thead tr th.headerSortDown span {
    background-image: url('http://i.imgur.com/RkA9MBo.png');
  }


  #keywords tbody tr {
    color: #555;
  }
  #keywords tbody tr td {
    text-align: center;
    padding: 15px 10px;
  }
  #keywords tbody tr td.lalign {
    text-align: left;
  }
  .myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9));
	background:-moz-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-webkit-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-o-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-ms-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9',GradientType=0);
	background-color:#f9f9f9;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #ffffff;
	display:inline-block;
	cursor:pointer;
	color:#666666;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffffff;
  }
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9));
	background:-moz-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-webkit-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-o-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-ms-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:linear-gradient(to bottom, #e9e9e9 5%, #f9f9f9 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9',GradientType=0);
	background-color:#e9e9e9;
  }
  .myButton:active {
  	position:relative;
  	top:1px;
  }
</style>
<html>
  <body>
<!-- Dashboard Table -->
  <?php
    $servername = "localhost";
    $username = "epidemiaweb_test";
    $password = "eishoo6Pheis";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=epidemia_test", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e) {
          die( "PDO connection error ");
      }
    if(isset($_POST['submit'])) {
      try {
        $file_name = $_FILES["file"]["name"];
        $file_size = $_FILES["file"]["size"];
        $file_tmp = $_FILES["file"]['tmp_name'];
        $file_type= $_FILES["file"]['type'];
        if(empty($file_name)) {
          $errMSG =  "Please Select Excel File";
        }
        else {

        if(!isset($errMSG)) {
           $handle = fopen($file_tmp,"r");
              //File Upload Start
          try {
            // $target_path = $_SERVER['DOCUMENT_ROOT']. "/dashboard_test/" . basename($_FILES['file']['name']);
            // $target_path2 = "./home/leey/" . basename($_FILES['file']['name']);

            $valid_file = true;
            if($_FILES['file']['name']) {
              if(!$_FILES['file']['error']) {
                $new_file_name2 = strtolower($_FILES['file']['name']);
                if($_FILES['file']['size'] > (10240000)) {
                  $valid_file = false;
                  echo "File is to large";
                }
                if($valid_file) {
                  $moved = move_uploaded_file($file_tmp,$_SERVER['DOCUMENT_ROOT']. "/dashboard_test/" . $new_file_name2);
                  echo "Success!";
                }
              }
              else {
                 echo "upload triggered error: ".$_FILES['file']['error'];
              }
            }
            else
               echo "Error at ".$_FILES['file']['error'];

           if($moved) {
              echo "File is valid ";
              $stmt = $conn->prepare("INSERT INTO FilesEpi (file, type, size, path) VALUES (:file, :type, :size, :path)");
              $stmt->bindParam(':file', $file_name);
              $stmt->bindParam(':type', $file_type);
              $stmt->bindParam(':size', $file_size);
              $stmt->bindParam(':path', $file_tmp);
              if($stmt->execute()) {
                echo "Data correctly inserted to FilesEpi tables correctly";
              }
              else {
                echo "FilesEpi is failed";
              }
            }
            else
               echo "Error about moved ". $_FILES['file']['error'];
          }
           catch(PDOException $e) {
             die("try catch error !! ");
           }
             //File Upload
             //Excel Data insert into MySQL
             try {
                if($handle !==FALSE) {
                  while(($filesop = fgetcsv($handle,10000,','))!==FALSE) {
                      $Zone = $filesop[0];
                      $Woreda = $filesop[1];
                      $col3 = $filesop[2];
                      $col4 = $filesop[3];
                      $col5 = $filesop[4];
                      $col6 = $filesop[5];
                      $col7 = $filesop[6];
                      $col8 = $filesop[7];
                      $col9 = $filesop[8];
                      $col10 = $filesop[9];
                      $col11 = $filesop[10];
                      $col12 = $filesop[11];
                      $col13 = $filesop[12];
                      $col14 = $filesop[13];
                      $col15 = $filesop[14];
                      $col16 = $filesop[15];
                      $col17 = $filesop[16];
                      $col18 = $filesop[17];
                      $col19 = $filesop[18];
                      $col20 = $filesop[19];
                      $col21 = $filesop[20];
                      $col22 = $filesop[21];
                      $col23 = $filesop[22];
                      $col24 = $filesop[23];
                      $col25 = $filesop[24];
                      $col26 = $filesop[25];
                      $col27 = $filesop[26];
                      $col28 = $filesop[27];
                      $col29 = $filesop[28];
                      $col30 = $filesop[29];
                      $col31 = $filesop[30];
                      $col32 = $filesop[31];
                      $col33 = $filesop[32];
                      $col34 = $filesop[33];
                      $col35 = $filesop[34];
                      $col36 = $filesop[35];
                      $col37 = $filesop[36];
                      $col38 = $filesop[37];
                      $col39 = $filesop[38];
                      $col40 = $filesop[39];
                      $col41 = $filesop[40];
                      $col42 = $filesop[41];
                      $col43 = $filesop[42];
                      $col44 = $filesop[43];
                      $col45 = $filesop[44];
                      $col46 = $filesop[45];
                      $col47 = $filesop[46];
                      $col48 = $filesop[47];
                      $col49 = $filesop[48];
                      $col50 = $filesop[49];
                      $col51 = $filesop[50];
                      $col52 = $filesop[51];
                      $col53 = $filesop[52];
                      $col54 = $filesop[53];
                      $col55 = $filesop[54];
                      $col56 = $filesop[55];
                      $col57 = $filesop[56];
                      $col58 = $filesop[57];
                      $col59 = $filesop[58];
                      $col60 = $filesop[59];
                      $col61 = $filesop[60];
                      $col62 = $filesop[61];
                      $col63 = $filesop[62];
                      $col64 = $filesop[63];

                      $stmt = $conn->prepare("INSERT INTO Data2 (Zone,Woreda,col3,col4,col5,col6,col7,col8,col9,col10,col11,col12,col13,col14,col15,col16,col17,col18,col19,col20,col21,col22,col23,col24,col25,col26,col27,col28,col29,col30,col31,col32,col33,col34,col35,col36,col37,col38,col39,col40,col41,col42,col43,col44,col45,col46,col47,col48,col49,col50,col51,col52,col53,col54,col55,col56,col57,col58,col59,col60,col61,col62,col63,col64) VALUES ('$Zone','$Woreda','$col3','$col4','$col5','$col6','$col7','$col8','$col9','$col10','$col11','$col12','$col13','$col14','$col15','$col16','$col17','$col18','$col18','$col19','$col20','$col21','$col22','$col23','$col24','$col25','$col26','$col27','$col28','$col29','$col30','$col31','$col32','$col33','$col34','$col35','$col36','$col37','$col39','$col40','$col41','$col42','$col43','$col44','$col45','$col46','$col47','$col48','$col49','$col50','$col51','$col52','$col53','$col54','$col55','$col56','$col57','$col58','$col59','$col60','$col61','$col62','$col63','$col64')");
                      $stmt->execute();
                  }
                }
                else {
                  echo "Insert part is problem";
                }
                fclose($handle);
                $stmt = null;
                $conn = null;
              } //try
             catch(PDOException $e) {
               die("Error occured");
              }
           }
        }//else
      }//try
      catch(PDOException $e) {
          die("File Upload failed: ");
      }
      $conn = null;
    }//$_post['submit']

//Show Files in Here :)
try {
    $servername = "localhost";
    $username = "epidemiaweb_test";
    $password = "eishoo6Pheis";
    $conn = new PDO("mysql:host=$servername;dbname=epidemia_test", $username, $password);
    $stmt = $conn->prepare("SELECT * FROM FilesEpi ORDER BY ID DESC");
    $stmt->execute();
    $result = $stmt->fetchAll();
}
catch(PDOException $e) {
  die("Error occured");
}
// Show File End;
?>
  <table id="keywords" cellspacing="0" cellpadding="0">
  <thead>
      <tr>
        <!-- <th><span>FileName</span></th>
        <th><span>Upload Time</span></th>
        <th><span>Rows Uploaded</span></th>
        <th><span>Rows in Use</span></th>
        <th><span>Download</span></th> -->
        <th><span>FileName</span></th>
        <th><span>type<span></th>
        <th><span>size</span></th>
        <th><span>Download</span></th>
      </tr>
  </thead>
      <tbody>
        <?php
        if(!empty($result)) {
          foreach($result as $row) {
         ?>
         <tr>
           <!-- file, type, size, path -->
            <td class="lalign"><?php echo $row["file"]; ?></td>
            <!-- <td>2017.02.27</td> -->
            <td><?php echo $row["type"]; ?></td>
            <td><?php echo $row["size"]; ?></td>
            <td class="lalign"><a href=<?php $row["path"]?>>Download</td>
         </tr>
         <?php
       }
     }
     ?>
      </tbody>
  </table>

<!-- File Upload  -->
  <form enctype="multipart/form-data" method="post" name="import">
          <li><label for="exampleInputFile">File Upload</label></li>
          <input type="file" class="myButton" name="file" id="file">
          <p>Only Excel</p>
      <input type="submit" class="myButton" name="submit" value="submit"/>
  </form>
</body>
</html>

<!--
bin  boot  data  db  dev  etc  home  kabru  lib  lib64  media  mnt  opt  proc  root

로그 체크하기..
맨 아래로 내려가서 data/epidemia/test/web/logs 로 가서 vi errors.log 하면 나옴.. -->
