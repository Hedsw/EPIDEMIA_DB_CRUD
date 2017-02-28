<?php
include('connect.php');

if(isset($_POST['submit'])) {
  $doc_name = $_POST['doc_name'];
  $name = $_FILES['myfile']['name'];
  $tmp_name = $_FILES['myfile']['tmp_name'];

  if($name && $doc_name) {
    $location = "documents/$name";
    move_uploaded_file($tmp_name,$location);
    $query = mysqli_query($con, "INSERT INTO File (name, path) VALUES ('$doc_name','$location')");
    header('Location:index.php');
  } else
  die("Please select a file");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Upload Documents</title>
  </head>
  <body>
    <form  action="upload.php" method="post" enctype="multipart/form-data">
        <label>Document Name</label>
        <input type="text" name="doc_name">
        <input type="file" name="myfile">
        <input type="submit" name="submit" value="Upload">
    </form>
  </body>
</html>
<!--
CREATE TABLE FilesEpi (
  ID int NOT NULL AUTO_INCREMENT,
  FileName varchar(100) NOT NULL,
  path varchar(400) NOT NULL,
  PRIMARY KEY (ID)
); -->
