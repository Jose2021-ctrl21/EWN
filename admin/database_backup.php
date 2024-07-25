<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
if(isset($_POST['backup'])) {
    // Create backup directory if it doesn't exist
    $backup_dir = 'upload/';
    if (!file_exists($backup_dir)) {
        mkdir($backup_dir, 0777, true);
    }

    // Backup database
    $backup_file = $backup_dir . 'backup_' . date("Y-m-d-H-i-s") . '.sql';
    $command = "mysqldump --user=username --password=password --host=localhost dbname > $backup_file";
    exec($command, $output, $return_var);

    if ($return_var === 0) {
        // Backup successful
        $response = array("type" => "success", "message" => "Database backup successful.");
    } else {
        // Backup failed
        $response = array("type" => "error", "message" => "Database backup failed: " . implode("\n", $output));
    }
    echo "Command: $command";

}
?>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Backup
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Backup</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
    <!-- <div class="row">
        <div class="col-md-4">
          <div class="box">
            <div class="box-body">
            </div>
          </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="box">
              <div class="box-body">
                <div class="form-group row">
                  <label for="dbname" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                        <h3>Backup Database</h3>
                  </div>
                </div>
                <form method="POST" action="backups/backup.php">
                    <div class="form-group row">
                          <label for="server" class="col-sm-3 col-form-label">Server</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="server" name="server" value="localhost" required>
                          </div>
                    </div>
                    <div class="form-group row">
                          <label for="username" class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" required>
                          </div>
                    </div>
                    <div class="form-group row">
                          <label for="password" class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password">
                          </div>
                    </div>
                    <div class="form-group row">
                          <label for="dbname" class="col-sm-3 col-form-label">Database</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="dbname" name="dbname" value="payroll" required>
                          </div>
                    </div>
                    <div class="form-group row">
                    <label for="dbname" class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                                <button type="submit" class="btn btn-info btn-lg span4" name="backup"><i class="fa fa-database"></i> BACKUP DATABASE</button>
                          </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>
      <!-- end row -->
    </section>   
  </div>
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>

</body>
</html>
