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
  <h1>Dashboard</h1>
<!--PDO로 연결하기 -->
  <?php
    $servername = "localhost";
    $username = "epidemiaweb_test";
    $password = "eishoo6Pheis";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=epidemia_test", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e) {
          echo "Error";
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
          echo $file_name;
          echo $file_tmp;
        $c = 0;
        if(!isset($errMSG)) {
           $handle = fopen($file_tmp,"r");
              //File Upload Start
          try {
            $upload_dir = $_SERVER['DOCUMENT_ROOT']."/home/leey/data/";
            // $upload_dir = "home/leey/data";
            $location = "home/leey/data/";
            $location2 = $location . basename($_FILES["file"]["name"]);
            $ExcelExt = strtolower(pathinfo($file_name,PATHINFO_EXTENSION)); // get Excel Extension
            $valid_extensions = array('xls','csv','xlsx'); //valid extension
            $userExcel = rand(1000,10000000).".".$ExcelExt;
            if(in_array($ExcelExt,$valid_extensions)) {
                if($file_size < 50000000) {
            $moved = move_uploaded_file($file_tmp,$location2);
            if($moved) {
              echo "Successfuly move_uploaded_file";
            }
            else {
              echo "Not uploaded because of error #".$_FILES["file"]["error"];
            }
          }
          else {
            $errMSG = "Sorry, your file is too large it should be less then 50MB";
          }
            }
            else {
                  $errMSG = "Uploaded file is empty";
            }
            if(!isset($errMSG))
            {
              $stmt = $conn->prepare("INSERT INTO FilesEpi (fileName, path) VALUES ('$file_name','$location')");
              $stmt->bindParam('$file_name',$file_name);

             if($stmt->execute())
                {
                 $successMSG = "new record succesfully inserted ...";
                }
             else
               {
                 $errMSG = "error while inserting....";
               }
            }//  if(!isset($errMSG))
          }
           catch(PDOException $e) {
             echo "File Upload failed: ";
           }
             //File Upload
             //Excel Data insert into MySQL
             try {
                if($handle !==FALSE) {
                  while(($filesop = fgetcsv($handle,10000,','))!==FALSE) {
                      $id = $filesop[0];
                      $name = $filesop[1];
                      $population = $filesop[2];
                      $pop_density = $filesop[3];
                      $country = $filesop[4];
                      $latitude = $filesop[5];
                      $longitude = $filesop[6];

                      $stmt = $conn->prepare("INSERT INTO Data (ID,name,population,pop_density,country,latitude,longitude) VALUES ('$id','$name','$population','$pop_density','$country','$latitude','$longitude')");
                      $stmt->execute($filesop);
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
               echo "Error occured";
              }
           }
        }//else
      }//try
      catch(PDOException $e) {
          echo "File Upload failed: ";
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
  echo "Error occured";
}
// Show File End;
?>
  <table id="keywords" cellspacing="0" cellpadding="0">
  <thead>
      <tr>
        <th><span>FileName</span></th>
        <th><span>Upload Time</span></th>
        <th><span>Rows Uploaded</span></th>
        <th><span>Rows in Use</span></th>
        <th><span>Download</span></th>
      </tr>
  </thead>
      <tbody>
        <?php
        if(!empty($result)) {
          foreach($result as $row) {
         ?>
         <tr>
            <td class="lalign"><?php echo $row["fileName"]; ?></td>
            <td>2017.02.27</td>
            <td>3224</td>
            <td>1234</td>
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
