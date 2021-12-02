<!DOCTYPE html>
<html>
<?php 
  include("phantrangadmin/head.php");
  include("phantrangadmin/session.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
  include("phantrangadmin/header.php");
  include("phantrangadmin/aside.php");
  ?>

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <h1 style="text-align: center; color: red; font-weight: bold;">Backup & Restore</h1>
                <ol class="breadcrumb">
                    <li>
                        <form role="form" action="backupdulieu/backupdulieu.php" method="POST" enctype="multipart/form-data">
                            <div class="" style="background-color: unset; text-align: center;">
                                <button type="submit" class="btn btn-primary" name="backup">Backup dữ liệu</button>
                            </div>
                        </form>
                    </li>
                    <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        Restore dữ liệu
                    </button>
                    </li>
                </ol>
            </div>

            <!-- Modal restore -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                      <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Restore dữ liệu</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                  <?php
                    if (! empty($response)) {
                        ?>
                    <div class="response <?php echo $response["type"]; ?>
                        ">
                        <?php echo nl2br($response["message"]); ?>
                    </div>
                    <?php
                    }
                    ?>
                    <form method="post" action="" enctype="multipart/form-data"
                        id="frm-restore">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name_cate">Chọn file dữ liệu</label>
                                <input type="file" name="backup_file" class="input-file" required/>
                            </div>
                        </div>
                        <div class="box-footer" style="background-color: unset; text-align: center;">
                            <input type="submit" name="restore" value="Restore"
                                class="btn btn-primary" />
                        </div>
                    </form>
                  </div>
              </div>
            </div>
            <!-- end modal restore-->


            <?php
                $conn = mysqli_connect("localhost", "root", "", "webbanhphp");
                if (! empty($_FILES)) {
                    // Validating SQL file type by extensions
                    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
                        "sql"
                    ))) {
                        $response = array(
                            "type" => "error",
                            "message" => "Invalid File Type"
                        );
                    } else {
                        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
                            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
                            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
                        }
                    }
                }

                function restoreMysqlDB($filePath, $conn)
                {
                    $sql = '';
                    $error = '';
                    
                    if (file_exists($filePath)) {
                        $lines = file($filePath);
                        
                        foreach ($lines as $line) {
                            
                            // Ignoring comments from the SQL script
                            if (substr($line, 0, 2) == '--' || $line == '') {
                                continue;
                            }
                            
                            $sql .= $line;
                            
                            if (substr(trim($line), - 1, 1) == ';') {
                                $result = mysqli_query($conn, $sql);
                                if (! $result) {
                                    $error .= mysqli_error($conn) . "\n";
                                }
                                $sql = '';
                            }
                        } // end foreach
                        
                        if ($error) {
                            $response = array(
                                "type" => "error",
                                "message" => $error
                            );
                        } else {
                            $response = array(
                                "type" => "success",
                                "message" => "Database Restore Completed Successfully."
                            );
                        }
                    } // end if file exists
                    return $response;
                }
                ?>

          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include('phantrangadmin/footer.php')
?>
</body>
</html>

