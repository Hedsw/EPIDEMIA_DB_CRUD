<!DOCTYPE html>
<?php
 include 'db.php';
?>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <title>EPIDEMIA Test</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="Hemant Vishwakarma">
  <meta name="description" content="Import Excel File To MySql Database Using php">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
 <body>
    <br><br>
        <div class="container">
            <div class="row">
             <div class="col-md-12 text-center"><h1>Hi</h1></div>
    <br>
                <div class="col-md-3 hidden-phone"></div>
                <div class="col-md-6" id="form-login">
                    <form class="well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Import CSV/Excel file</legend>
                            <div class="control-group">
                                <div class="control-label">
                                    <label>CSV/Excel File:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="file" name="file" id="file" class="input-large form-control">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" id="submit" name="Import" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 hidden-phone"></div>
            </div>


            <table class="table table-bordered">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Semester</th>


                        </tr>
                      </thead>
                <?php
                    $SQLSELECT = "SELECT * FROM subject ";
                    $result_set =  mysql_query($SQLSELECT, $conn);
                    while($row = mysql_fetch_array($result_set))
                    {
                    ?>
                        <tr>
                            <td><?php echo $row['SUBJ_ID']; ?></td>
                            <td><?php echo $row['SUBJ_CODE']; ?></td>
                            <td><?php echo $row['SUBJ_DESCRIPTION']; ?></td>
                            <td><?php echo $row['UNIT']; ?></td>
                            <td><?php echo $row['SEMESTER']; ?></td>
                        </tr>
                    <?php
                    }
                ?>
            </table>
        </div>
 </body>
</html>
